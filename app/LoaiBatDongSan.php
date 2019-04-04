<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBatDongSan extends Model {
	protected $table = "loai_bds";
	public function batdongsan(){
		return $this->hasMany('App\BatDongSan','loaiid','loaiid');

	}
	public function yeucaukh(){
		return $this->hasOne('App\YeuCauKhachHang','loaiid','loaiid');
		
	}
	public $timestamps = false;
}
