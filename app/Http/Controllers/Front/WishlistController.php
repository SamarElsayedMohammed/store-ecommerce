<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->id())
            ->with([
                'wishlist' => function ($q) {
                    $q->with('file');
                }
            ])->first();
        ;
        $products = $user->wishlist; // task for you basically we need to use pagination here
        return view('front.user.wishlist', compact('products'));
    }


    public function store()
    {
        $user = User::where('id', auth()->id())->first();

        if (!$user->wishlistHas(request('productId'))) {
            $user->wishlist()->attach(request('productId'));
            return response()->json(['status' => true, 'wished' => true]);
        }
        $user->wishlist()->detach(request('productId'));
        return response()->json(['status' => true, 'wished' => false]); // added before we can use enumeration here
    }
    public function destroy()
    {
        $user = User::where('id', auth()->id())->first();
        $user->wishlist()->detach(request('productId'));
        return response()->json(['status' => "deleted"]);
    }

}