<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public static function loadProductsCategories()
	{
		$var = 'Add Products & Categories';
		return view('auth/loadProductsCategories',['var' => $var]);
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
}
