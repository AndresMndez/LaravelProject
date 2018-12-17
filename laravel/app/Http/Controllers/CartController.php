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
      session()->push('cart', $id);
      Cart::find($id);
      $nombre=Category::all();
      return redirect('cart/show');
    }

    //quitar  item
    public function quitar($id){
      $nombre=Category::all();
        session()->forget($id);
        $productos = Product::whereIn('id', session()->get('cart'))->get();
        return view('cart/view',compact('nombre','productos'));
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
