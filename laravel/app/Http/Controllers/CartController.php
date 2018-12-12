<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Cart;

class CartController extends Controller
{



    //mostrar carrito

    public function show(){
      $productos = Product::whereIn('id', session()->get('cart'))->get();
      return view('cart/view', compact('productos'));
    }

    //agregar item
    public function add($id){
      session()->push('cart', $id);
      Cart::find($id);
      return redirect('cart/show');
    }

    //quitar  item
    public function quitar($id){
      session()->forget($id);
      return redirect('cart/show');
      //borra la clave y su valor de session
    }

    //actualizar


}
