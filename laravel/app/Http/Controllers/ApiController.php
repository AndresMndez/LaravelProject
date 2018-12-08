<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\CategoryCollection;
use App\Product;
use App\Http\Resources\ProductCollection;
use App\User;
use App\Http\Resources\UserCollection;


class ApiController extends Controller
{
	public static function products()
	{
		return  new ProductCollection(Product::all());
	}

	public static function categories()
	{
		return new CategoryCollection(Category::all());
	}

	public static function categoriesAndProducts()
	{
		$Categories= Category::all();
		foreach ($Categories as $category) {
			$prodcat[$category->name]=$category->products;
		}
		return new CategoryCollection($Categories);
	}

	public static function users()
	{
		return new UserCollection(User::all());
	}


}
