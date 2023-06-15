<?php
namespace App\Services\Payments;

use GuzzleHttp\Client;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;

class Fatoorah
{

    public $base_url;
    public $token;
    public $request_client;

    public $mfObj;
    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;
        $this->base_url = env('MYFATOORAHBASEURL');
        $this->token = env('MYFATOORAHTOKEN');
        $this->mfObj = new PaymentMyfatoorahApiV2(config('myfatoorah.api_key'), config('myfatoorah.country_iso'), config('myfatoorah.test_mode'));
    }



    /**
     * create MyFatoorah object
     */


    /**
     * Create MyFatoorah invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function index($data)
    {
        try {
            $data = $this->mfObj->getInvoiceURL($this->getPayLoadData($data));

            return response()->json(['IsSuccess' => 'true', 'Message' => 'Invoice created successfully.', 'Data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['IsSuccess' => 'false', 'Message' => $e->getMessage()]);
        }
    }

    /**
     * 
     * @param int|string $orderId
     * @return array
     */
    private function getPayLoadData($data)
    {
        $callbackURL = route('myfatoorah.callback');

        return [
            'CustomerName' => $data['customerName'],
            'InvoiceValue' => $data['amount'],
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail' => $data['customerEmail'],
            'CallBackUrl' => $callbackURL,
            'ErrorUrl' => $callbackURL,
            'MobileCountryCode' => '+965',
            'CustomerMobile' => $data['phone'],
            'Language' => $data['Language'],
            'CustomerReference' => $data['PaymentMethodId'],
            'SourceInfo' => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package '
        ];
    }

    /**
     * Get MyFatoorah payment information
     * 
     * @return \Illuminate\Http\Response
     */
    public function callback()
    {
        try {
            $data = $this->mfObj->getPaymentStatus(request('paymentId'), 'PaymentId');

            if ($data->InvoiceStatus == 'Paid') {
                $msg = 'Invoice is paid.';
            } else if ($data->InvoiceStatus == 'Failed') {
                $msg = 'Invoice is not paid due to ' . $data->InvoiceError;
            } else if ($data->InvoiceStatus == 'Expired') {
                $msg = 'Invoice is expired.';
            }

            return response()->json(['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['IsSuccess' => 'false', 'Message' => $e->getMessage()]);
        }
    }


}