<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Models\UserProduct;
use DateTime;

class OrderController extends Controller
{
    public function orders(Request $request) {
        return view('order_list', [
            'orders' => Auth::user()->orders,
        ]);
    }

    public function create_order(Request $request) {
        if (Auth::check()) {
            $currentDateTime = new DateTime();

            $order = Order::create([
                'unique_numbers' => Str::random(13),
                'delivered_at' => $currentDateTime->format('Y-m-d H:i:s'),
                'fio' => $request->fio,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'payment_method' => $request->payment_method,
            ]);
    
            if ($order) {
                $products = Auth::user()->products;

                foreach ($products as $product) {
                    $order->products()->attach($product->id);
                    $product = UserProduct::where('id', $product->pivot->id)->first();
                    $product->delete();
                }

                Auth::user()->orders()->attach($order->id);

                return redirect('/profile');
            }
        }

        return redirect('/sign-in');
    }

    public function remove_order(Request $request, int $id) {
        if (Auth::check()) {
            $order = Order::where('id', $id)->first();
            $order->delete();

            return redirect('/profile');
        }

        return redirect('/sign-in');
    }
}
