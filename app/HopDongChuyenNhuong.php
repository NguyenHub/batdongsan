<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopDongChuyenNhuong extends Model {
	protected $table = "hopdong_chuyennhuong";

	public function khachhang(){
		return $this->belongsTo('App\Khachhang','khid','id');
	}

	public function batdongsan(){
		return $this->belongsTo('App\BatDongSan','bdsid','id');
	}

	public function datcoc(){
		return $this->belongsTo('App\HopDongDatCoc','dcid','id');
	}
	
	public $timestamps = false;
}
