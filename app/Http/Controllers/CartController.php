<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserProduct;


class CartController extends Controller
{
    public function cart(Request $request) {
        if (Auth::check()) {
            $price = 0;
            $products = Auth::user()->products;

            foreach ($products as $product) {
                $price += $product->price;
            }

            return view('cart', [
                'products' => $products,
                'price' => $price,
            ]);
        }

        return redirect('/sign-in');
    }

    public function add_to_cart(Request $request, int $id) {
        if (Auth::check()) {
            Auth::user()->products()->attach($id);
            return redirect('/product-list');
        }

        return redirect('/sign-in');
    }

    public function remove_from_cart(Request $request, int $id) {
        if (Auth::check()) {
            $user_product = UserProduct::where('id', $id)->first();
            $user_product->delete();
            return redirect('/cart');
        }

        return redirect('/sign-in');
    }
} 
