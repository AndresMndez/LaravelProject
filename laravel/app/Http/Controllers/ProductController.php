<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function agregar($request){
      $producto = new Product;
      $producto->name = request()->input('name');
      $producto->description = request()->input('description');
      //IMAGEN
      $producto->image = request()->input('image');
      //IMAGEN
      $producto->brand = request()->input('brand');
      $producto->price = request()->input('price');
      $producto->save();

      return view();
    }

    public function modify($request){
      $producto = Product::find($id);
      $producto->update(request()->all());

      return view();
    }

    public function drop($id){
      $producto = Product::find($id);
      $producto->delete();
    }
}
