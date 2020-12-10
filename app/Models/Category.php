<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	function getcategorylist()
	{
		return DB::table('categories')
            ->select('id','category_name')
            ->get();
	}
}
