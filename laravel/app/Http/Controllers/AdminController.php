<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class AdminController extends Controller
{

	public function __construct()
	{
			$this->middleware('admin');
	}

	public static function addProduct()
	{
		$nombre=\App\Category::all();
		return view('auth/addProduct',compact('nombre'));
	}

	public static function catalog()
	{
		$productos = App\Product::whereNotNull('id')->paginate(10);

		return view('admin.products',compact('productos'));
	}

	public static function index()
	{
		$var = 'My Admin page';
		return view('auth/index',['var'=>$var]);
	}

	public static function save(Request $request)
	{
		$product=\App\Product::find($request->id);
		$product->name=$request->product;
		$product->description=$request->description;
		$product->brand=$request->brand;
		$product->price=$request->price;
		if ($request->delete){
			$product->delete_at=$request->delete;
		}
		$product->save();
		$saved="It saved your changes";
		$var='Catalog';
		return view('auth/catalog',['var'=>$var],['saved'=>$saved]);
	}

	public static function users()
	{
		$usuarios = App\User::whereNotNull('id')->paginate(10);
		return view('admin/users',compact('usuarios'));
	}
}
