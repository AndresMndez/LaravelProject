<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use \App\Category;
use \App\Product;
use \App\Cart;

class CartController extends Controller
{



    //mostrar carrito

    public function show(){
      if (\Auth::user()){
        $carts=Cart::all();
        foreach ($carts as $cart) {
          if ($cart->user_id==\Auth::user()->id&&$cart->purchased==0){
            $productos=$cart->products()->get();
            $categories=Category::all();
            return view('cart/view',compact('productos','categories'));
          }
        }
        $categories=Category::all();
        return view('cart/defaultview',compact('categories'));
      } else {
        return view('auth/login');
      }
    }

    //agregar item
    public function add($id)
    {

      if (\Auth::user()){
        $product=Product::find($id);
        $carts=Cart::all();

        /*Busco el carrito del usuario*/
        foreach ($carts as $cart) {
          if ($cart->user_id==\Auth::user()->id&&$cart->purchased==0){
            $cart->products()->attach( $product->id ,['precio'=> $product->price]);
            $productos=$cart->products()->get();
            $categories=Category::all();
            return view('cart/view',compact('productos','categories'));
          }
        }
        /*si no encontro un carrito no comprado*/
        $user= \Auth::user();
        $cart=New Cart;
        $cart->purchased=0;
        $cart->user_id=$user->id;
        $cart->save();
        $cart= Cart::orderBy('id','DESC')->first();
        $cart->products()->attach( $product->id ,['precio'=> $product->price]);
        $productos=$cart->products()->get();
        $categories=Category::all();
        return view('cart/view',compact('productos','categories'));
      } else {
        return view('auth/login');
      }
    }

    //quitar  item
    public function quitar($id)
    {
      if (\Auth::user()){
        $carts=Cart::all();
        $product=Product::find($id);
        $categories=Category::all();
        foreach ($carts as $cart) {
          if ($cart->user_id==\Auth::user()->id&&$cart->purchased==0){
            $cart->products()->detach($id ,['precio' =>$product->price]);
            if (count($cart->products()->get())>= 1){
              $productos=$cart->products()->get();
              return view('cart/view',compact('productos','categories'));
            } else {
              return view('cart/defaultview',compact('categories'));
            }
          }
        }
        return view('cart/defaultview',compact('categories'));
      } else {
        return view('auth/login');
      }
    }

    //actualizar
    public function compra()
    {
      if (\Auth::user()){
        $carts=Cart::where([['user_id','=',\Auth::user()->id],['purchased','=', 0]])->get();
        $carts[0]->purchased=1;
        $carro=$carts[0]->products()->get();
        foreach ($carro as $product) {
          $carts[0]->total+=$product->price;
        }
        $carts[0]->save();
        $carts=Cart::where([['user_id','=',\Auth::user()->id],['purchased','=', 1]]);
        $categories=Category::all();
        return view('/cart/compras',compact('categories','carts'));
      } else {
        return view('auth/login');
      }
    }

}
