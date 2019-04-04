<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model {
	protected $table = "khachhang";

	public function Nhanvien() {
		return $this->belongsTo('app\Nhanvien', 'nvid', 'id');
	}
}
