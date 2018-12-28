<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nombre=Category::all();
      $categories=Category::all();
      $products=Product::all()->take(4);
      return view('principal.index',compact('categories','products','nombre'));
    }
    public function preguntas()
    {
      $nombre=Category::all();
      return view('principal.preguntas',compact('nombre'));
    }
    public function firstWatch()
    {
      return view('principal.home');
    }
}
