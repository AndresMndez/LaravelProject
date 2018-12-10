<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
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

	public static function show(Request $request,$id)
	{
		$value = $request->session()->get('key');
		dd($request);
		return view('principal/prueba');
	}
}
