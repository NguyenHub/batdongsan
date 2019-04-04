<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatDongSan extends Model {
	//
	protected $table = "batdongsan";
	public function hinhanh (){
		return $this->hasMany('App\HinhAnh','bdsid','bdsid');
	}
	public function loaibds(){
		return $this->belongsTo('App\LoaiBatDongSan','loaiid','bdsid');
	}
	public function khachhang(){
		return $this->belongsTo('App\KhachHang','khid','bdsid');
	}
	public function chyennhuong(){
		return $this->belongsTo('App\HopDongChuyenNhuong','bdsid','bdsid');
	}
	public function kygui(){
		return $this->belongsTo('App\HopDongKyGui','bdsid','bdsid');
	}
	public function datcoc(){
		return $this->belongsTo('App\HopDongDatCoc','bdsid','bdsid');
	}
	public $timestamps = false;
}
