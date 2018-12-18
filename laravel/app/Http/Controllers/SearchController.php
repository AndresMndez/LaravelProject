<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use \App\Category;

class SearchController extends Controller
{
	public static function buscarPost(Request $request)
	{
		if (strpos($request->input('search'),";")){
			return redirect('/home');
		}
		$buscar="%".$request->input('search')."%";
		$categories=Category::all();
		$products=DB::table('products')->where('name','like',$buscar)->orWhere('description','like',$buscar)->orWhere('brand','like',$buscar)->orderBy('name')->get();
		$buscar=str_replace("%","",$buscar);
		return view('/principal/results',compact('categories','products','buscar'));


	}

}
