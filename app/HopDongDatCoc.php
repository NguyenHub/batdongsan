<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopDongDatCoc extends Model {
	protected $table = "hopdong_datcoc";

	public function khachhang(){
		return $this->belongsTo('App\Khachhang','khid','id');
	}

	public function batdongsan(){
		return $this->belongsTo('App\BatDongSan','bdsid','id');
	}
	
	public $timestamps = false;
}
