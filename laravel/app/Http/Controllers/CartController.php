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
      $categories=Category::all();
      if (session()->get('cart')) {
        $productos = Product::whereIn('id', session()->get('cart'))->get();
        return view('cart/view', compact('productos','categories'));
      }else{
        return view('cart/defaultview',compact('categories'));
      }
    }

    //agregar item
    public function add($id){
      $product=Product::find($id);
      if (\Auth::user()){
        $carts=Cart::all();
        foreach ($carts as $cart) {
          if ($cart->user_id==\Auth::user()->id){
            break;
          }
        }
        $cart->total=($cart->total)+($product->price);
        $cart->save();
        $cart->products()->attach( $product->id ,['precio'=>  $product->price]);
        $productos=$cart->products()->get();
      } else {
        if (session()->get('cart')){
          $cart=Cart::find('id',session()->get('cart'))->get();
          $cart->total=$cart->total+$product->price;
          $cart->products()->attach( $product->id ,['precio'=>  $product->price]);
          $productos=$cart->products()->get();
        } else {
          $cart=new Cart;
          $cart->total=$product->price;
          $cart->purchased=0;
          $cart->save();
          $cart->products()->attach( $product->id ,['precio'=>  $product->price]);
          $productos[]=$cart->products()->get();
        }
      }
      $categories=Category::all();
      return view('cart/view',compact('productos','categories'));
    }

    //quitar  item
    public function quitar($id){
      $categories=Category::all();
        session()->forget($id);
        $productos = Product::whereIn('id', session()->get('cart'))->get();
        return view('cart/view',compact('productos','categories'));
      // } else{
        // return view('cart/defaultview',compact('nombre'));
      // }
      //borra la clave y su valor de session
    }

    //actualizar
    public function compra()
    {
      $user= \Auth::user();
      $cart=New Cart;
      $cart->total=0;
      $cart->purchased=1;
      $cart->user_id=$user->id;
      $cart->save();
      $cart= Cart::orderBy('id','DESC')->first();
      $productos = Product::whereIn('id', session()->get('cart'))->get();
      foreach ($productos as $product) {
        $cart->total+=$product->price;
        $cart->products()->attach( $product->id ,['precio'=>  $product->price]);
      }
      dd($cart);
    }

}
