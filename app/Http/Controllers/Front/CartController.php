<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\RealProductCart;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Cookie;
use PhpParser\ErrorHandler\Collecting;
use App\Repositories\CookieCartRepository;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = new CookieCartRepository();
    }

    public function index(RealProductCart $products)
    {
       $cart = collect($this->cart->get());
    //    return $this->cart->total();
        $totalPrice = $this->cart->totalPrice();
        $cartItems = $products->RealProductsDetails($cart);

        return view('front.cart', compact('cartItems', 'totalPrice'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
            'quantity' => ['nullable', 'int', 'min:1'],
        ]);

        $product = Product::findOrFail($request->post('product_id'));
        $this->cart->add($product, $request->post('quantity'));

        if ($request->expectsJson()) {

            return response()->json([
                'message' => 'Item added to cart!',
            ], 201);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required', 'int', 'min:1'],
        ]);

        $this->cart->update($id, $request->post('quantity'));
    }

    public function destroy($id)
    {
        $this->cart->delete($id);

        return [
            'message' => 'Item deleted!',
        ];
    }
    public function emptyCart($id)
    {
        $this->cart->empty($id);

        return [
            'message' => 'cart is empty now',
        ];
    }

}