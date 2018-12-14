<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use \App\Product;
use \App\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $dates = ['delete_at'];


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
        if(strtolower($category->name)==strtolower($request->input('category'))){
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

      $productos = Product::whereNull('delete_at')->paginate(10);
      $saved="Se han guardado los cambios";
  		return view('admin/products',compact('productos','saved'));
    }

    public static function delete(Request $request)
    {
      $product=Product::find($request->input('id'));
      $product->delete_at=date("Y-m-d ");
      $product->save();
      $saved="Se ha borrado con exito el articulo";
      $productos=Product::whereNull('delete_at')->paginate(10);
      return view('admin/products',compact('productos','saved'));
    }

}
