<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Product;

class CategoryController extends Controller
{

	public static function index()
	{
			$categories=Category::all();
			$nombre=$categories;
			foreach ($categories as $value) {
				$products[]=$value->products;
			}
			foreach ($products as $value){
				$product[]=$value;
			}
			dd($product);
			return view('principal/categories',compact('categories','products','nombre'));
	}


  public static function show($name)
	{
			$category=Category::where('name',$name)->get();
			$products=$category[0]->products;
			$nombre=Category::all();
			return view('principal/product-category',compact('category','products','nombre'));
	}

}
