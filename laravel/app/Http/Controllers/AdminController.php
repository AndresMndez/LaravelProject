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
		$nombre=Category::all();
		return view('auth/addProduct',compact('nombre'));
	}

	public static function catalog()
	{
		$productos =Product::whereNotNull('id')->paginate(10);

		return view('admin.products',compact('productos'));
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
		// dd($product);
		return view('admin/product/change',['product'=>$product]);
	}

	public static function editorUser($id)
	{
		$user=User::find($id);
		return view('admin/user/change',compact('user'));
	}

	public static function editUser(Request $request)
	{
		$user=User::find($request->input('id'));
		$user->name=$request->input('name');
		$user->email=$request->input('email');
		$user->is_admin=$request->input('is_admin');
		$user->save();
		$saved="Se han guardado los cambios de ".$user->email;
		$usuarios =User::whereNull('deleted_at')->paginate(10);
		return view('admin/users',compact('usuarios'));
	}

}
