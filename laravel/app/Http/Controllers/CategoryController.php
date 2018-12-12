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
			$products=Product::all();
			return view('principal/product-category',compact('category','products'));
	}


  public static function show($name)
	{
			$category=Category::where('name',$name)->get();
			$products=$category[0]->products;
			$nombre=Category::all();
			return view('principal/product-category',compact('category','products','nombre'));
	}

}
