<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

	public function __construct()
	{
			$this->middleware('admin');
	}

	public static function addProduct()
	{
		$var = 'Add Products & Categories';
		return view('auth/addProduct',['var' => $var]);
	}

	public static function catalog()
	{
		$var = 'Catalog';
		return view('auth/catalog',['var'=>$var]);
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
		$var='Users Existance';
		return view('auth/users',['var'=>$var]);
	}
}
