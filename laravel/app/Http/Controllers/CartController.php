<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Product;
use \App\Cart;

class CartController extends Controller
{



    //mostrar carrito

    public function show(){
      $nombre=Category::all();
      if (session()->get('cart')) {
        $productos = Product::whereIn('id', session()->get('cart'))->get();
        return view('cart/view', compact('productos','nombre'));
      }else{
        return view('cart/defaultview',compact('nombre'));
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
      $cart=Cart::find($id);
      $cart->total=0;
      $itmes=$cart->products();
      foreach ($items as $product) {
        $cart->total+=$product->price;
      }

    }

}
