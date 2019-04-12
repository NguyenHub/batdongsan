<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model {
	protected $table = "hinhbds";
	public function hinh_batdongsan(){
		return $this->belongsTo('App\BatDongSan','bdsid','id');
	}
	public $timestamps = false;
}
