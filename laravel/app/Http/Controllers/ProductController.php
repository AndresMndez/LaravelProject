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


    /*Muestra el producto*/
    public function show($categories,$productid)
    {
      /*Busco su Categoria Asi muestro luego la/s categorias relacionadas con el*/
      $category=\App\Category::where('name',$categories)->get();
      /*Busco todas las categorias para el section*/
      $categories=\App\Category::all();
      /*Busco el producto que se quiere mirar*/
      $product=\App\Product::find($productid);
      return view('/principal/productview',compact('categories','category','product'));
    }

    public static function edit(Request $request)
    {
      $categories=Category::all();
      $categoryExists=false;
      $product=Product::find($request->input('id'));
      /*Me fijo si se agrego una categoria*/
      foreach ($categories as $category) {
        if(strtolower($category->name)==strtolower($request->input('category'))){
          $categoryExists=true; //la Categoria la categoria existe
          $product->categories()->sync($category->id);
        }
      }
      /*Si la categoria no existe la creo*/
      if ($categoryExists==false){
        $category= new Category(['name'=>$request->input('category')]);
        $category->save();
        /*La sincroniso con el producto*/
        $category=Category::orderBy('id','DESC')->first();
        $product->categories()->sync($category->id);
      }
      $product->name=$request->input('name');
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->brand=$request->input('brand');
      /*si viene una imagen*/
      if ($request->file('avatar')){
        $file = $request->file('avatar');
        /*Le pongo el nombre del producto y le doy su extensión*/
        $name=str_replace(" ","_",$product->name).".".$file->extension();
        /*Busco el nombre de su categoria*/
        $folder=$product->categories[0]->name;
        $path=$file->storeAs($folder,$name);
        /*Genero el nombre de la imagen para luego guardar la en la bd*/
        $path="/"."images/".$product->categories[0]->name."/$name";
        $product->image=$path;
      }
      /*Guardo todo el producto*/
      $product->save();

      $productos = Product::whereNull('delete_at')->paginate(10);
      $saved="Se han guardado los cambios";
  		return view('/admin/products',compact('productos','saved'));
    }

    public static function delete(Request $request)
    {
      /*Busco el producto a borrar y le doy un valor a deleted at*/
      $product=Product::find($request->input('id'));
      $product->delete_at=date("Y-m-d ");
      $product->save();
      $saved="Se ha borrado con exito el articulo";
      $productos=Product::whereNull('delete_at')->paginate(10);
      return view('/admin/products',compact('productos','saved'));
    }

    public static function add(Request $request)
    {
      /*Agregar un producto*/
      $product=new Product;
      $product->name=$request->input('name');
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->brand=$request->input('brand');
      /*Mefijo que exista una categoria*/
      if($request->input('cName')){
        /*Mefijo que venga un id de categoria*/
        if(!$request->input('catid')){
          /*Si no existe lo creo nuevo*/
          $category=new Category(['name'=>$request->input('cName')]);
          $category->save();
          $category=Category::orderBy('id','DESC')->first();
        } else {
          $category=Category::find($request->input('catid'));
        }
        /*De no existir una categoria lo devuelvo al usuario a la pagina de agregar productos*/
      } else {
        $nombre=Category::all();
        return view('/auth/addProduct',compact('nombre'));
      }
      /*Me fijo si viene un imagen*/
      if($request->file('avatar')){
        $file = $request->file('avatar');
        /*Doy nombre del producto*/
        $name=str_replace(" ","_",$product->name).".".$file->extension();
        /*Doy nombre a la carpeta del producto por su categoria*/
        $folder=$request->input('cName');
        $path=$file->storeAs($folder,$name);
        $path="/"."images/".$request->input('cName')."/$name";
        /*NOmbre para bd*/
        $product->image=$path;
      }

      $product->save();
      $product->categories()->sync($category->id);
    $categories=Category::all();
    return view('/auth/addProduct',compact('categories'));
    }
}
