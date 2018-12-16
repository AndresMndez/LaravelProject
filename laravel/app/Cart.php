<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Cart extends Model
{

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class)->withPivot('product_id','precio');
	}
}
