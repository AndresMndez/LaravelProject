<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use \App\Product;
use \App\Category;
use \App\User;

class AdminController extends Controller
{

	public function __construct()
	{
			$this->middleware('admin');
	}

	public static function addProduct()
	{
		$categories=Category::all();
		return view('auth/addProduct',compact('categories'));
	}

	public static function catalog()
	{
		$productos=Product::whereNull('delete_at')->paginate(10);
		$categories=Category::all();
		return view('admin/products',compact('productos', 'categories'));
	}

	public static function index()
	{
		$var = 'My Admin page';
		return view('auth/index',['var'=>$var]);
	}

	public static function users()
	{
		$usuarios =User::whereNull('deleted_at')->paginate(10);
		return view('admin/users',compact('usuarios'));
	}

	public static function editor($id)
	{
		$product=Product::find($id);
		$categories=Category::all();
		// dd($product);
		return view('admin/product/change',compact('product', 'categories'));
	}

	public static function editorUser($id)
	{
		$user=User::find($id);
		return view('admin/user/change',compact('user'));
	}

	public static function editUser(Request $request)
	{
		$user=User::find($request->input('id'));
		if($user->id==1&&$request->input('is_admin')!=1){
			return location('https://www.google.com/search?q=google&rlz=1C1CHBF_esAR798AR798&oq=go&aqs=chrome.1.69i57j0l5.1321j0j9&sourceid=chrome&ie=UTF-8');
		}
		$user->name=$request->input('name');
		$user->email=$request->input('email');
		$user->is_admin=$request->input('is_admin');
		$user->save();
		$usuarios =User::whereNull('deleted_at')->paginate(10);
		return view('admin/users',compact('usuarios'));
	}

}
