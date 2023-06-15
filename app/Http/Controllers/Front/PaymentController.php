<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Payments\Fatoorah;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    public function getPayments($amount)
    {
        return view('front.checkout', compact('amount'));
    }


    public function processPayment(Fatoorah $payment, Request $request)
    {

        $error = '';
        $data = [];

        //best practice as we do sperate validation on request form file
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:100',
        ]);

        if ($validator->fails()) {
            $error = 'Please check if you have filled in the form correctly. Minimum order amount is PHP 100.';
        }
        // return $request;
        $data['amount'] = $request->amount;
        $data['customerName'] = $request->customerName;
        $data['customerEmail'] = $request->customerEmail;
        $data['phone'] = $request->phone;
        $data['Language'] = 'ar';
        $data['PaymentMethodId'] = $request->PaymentMethodId;
        // return $data;
        $payData = $payment->index($data);
        $data = $payData->original['Data'];

        try {
            DB::beginTransaction();
            // if success payment save order and send realtime notification to admin
            $order = $this->saveOrder($request); // your task is  . add products with options to order to preview on admin
            $this->saveTransaction($order, $data['invoiceId']);
            DB::commit();

            //fire evet on order complete success for realtime notification
            // event(new NewOrder($order));

            return view('front.payment-process')->with($data);

        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex;
        }

    }

    private function saveOrder($request)
    {
        return Order::create([
            'customer_id' => 1,
            'customer_phone' => $request->phone,
            'customer_name' => $request->customerName,
            'total' => $request->amount,
            'locale' => 'en',
            'payment_method' => $request->PaymentMethodId,
            // you can use enumeration here as we use before for best practices for constants.
            'status' => Order::PAID,
        ]);

    }

    private function saveTransaction(Order $order, $PaymentId)
    {
        Transaction::create([
            'order_id' => $order->id,
            'transaction_id' => $PaymentId,
            'payment_method' => $order->payment_method,
        ]);
    }
}