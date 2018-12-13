<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


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

    public static function edit(Request $request)
    {
      $categories=Category::all();
      $categoryExists=false;
      $product=Product::find($request->input('id'));
      foreach ($categories as $category) {
        if($category->name==$request->input('category')){
          $categoryExists=true; //la Categoria la categoria existe
          $product->categories()->sync($category->id);
        }
      }
      if ($categoryExists==false){
        $category= new Category(['name'=>$request->input('category')]);
        $category->save();
        $category=Category::orderBy('id','DESC')->first();
        $product->categories()->sync($category->id);
      }

      $product->name=$request->input('name');
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->brand=$request->input('brand');
      if ($request->file('avatar')){
        $file = $request->file('avatar');
        $name=str_replace(" ","_",$product->name).".".$file->extension();
        $folder=$product->categories[0]->name;
        $path=$file->storeAs($folder,$name);
        $path="/"."storage/images/".$product->categories[0]->name."/$name";
        $product->image=$path;
      }
      $product->save();
      /*Me fijo si se agrego una categoria*/

      $productos = Product::whereNotNull('id')->paginate(10);
      $saved="Se han guardado los cambios";
  		return view('admin.products',compact('productos','saved'));
    }
}
