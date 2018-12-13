<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
	public static function delete($id)
	{
		$user=User::find($id);
		$user->deleted_at=date("Y-m-d");
		$user->save();
		$saved="The user has been deleted";
		$usuarios=User::whereNull('deleted_at')->get();
		return view('admin.users',compact('usuarios','saved'));
	}
}
