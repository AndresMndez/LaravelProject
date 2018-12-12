<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Categroy;

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
      $producto = \App\Product::find($id);
      $producto->update(request()->all());

      return view();
    }

    public function drop($id){
      $producto = \App\Product::find($id);
      $producto->delete();
    }

    public function show($categories,$productid)
    {
      $nombre=\App\Category::all();
      $category=\App\Category::where('name',$categories)->get();
      $product=\App\Product::find($productid);
      return view('principal/productview',compact('nombre','category','product'));
    }
}
