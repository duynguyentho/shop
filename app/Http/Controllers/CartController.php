<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
session_start();
class CartController extends Controller
{
    public function index()
    {
        return view('home.cart');
    }
    public function add(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        $is_avaiable = 0;
        if($cart==true){
            foreach($cart as $key => $val){
            if($val['product_id']==$data['id']){
                $is_avaiable = $is_avaiable + 1;
            }
        }
        if($is_avaiable == 0){
            $cart = array([
                'session_id' => $session_id,
                'product_id' => $data['id'],
                'product_name' => $data['name'],
                'product_image' => $data['image'],
                'product_quantity' => $data['quantity'],
                'product_price' => $data['price'],
            ]);
            Session::put('cart', $cart);
        }
        }else{
            $cart = array([
                'session_id' => $session_id,
                'product_id' => $data['id'],
                'product_name' => $data['name'],
                'product_image' => $data['image'],
                'product_quantity' => $data['quantity']++,
                'product_price' => $data['price'],
            ]);
            Session::put('cart',$cart);
        }
        Session::save();
        dd(count(Session('cart')[0]));
    }
        public function deleteItem(Request $request, $id)
        {
            $cart = Session::get('cart');
            if($cart){
                foreach($cart as $item => $val){
                    $a = $val['session_id'];
                    if($a == $id){
                        unset($cart[$item]);
                    }
                }
            }
            Session::put('cart', $cart);
            return back();
        }
}
