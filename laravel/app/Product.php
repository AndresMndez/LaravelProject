<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Cart;
use \App\Category;

class Product extends Model
{
	public function categories()
	{
		return $this->belongsToMany(Category::class,'category_product')->withPivot("category_id");
	}
	public function carts()
	{
		return $this->belongsToMany(Cart::class)->withPivot('cart_id');
	}
}
