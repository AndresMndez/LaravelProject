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
			return view('principal/categories',compact('categories'));
	}


  public static function show($name)
	{
			$category=Category::where('name',$name)->get();
			$products=$category[0]->products;
			$categories=Category::all();
			return view('principal/product-category',compact('category','products','categories'));
	}

}
