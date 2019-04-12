<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiBatDongSan;
use App\BatDongSan;
use App\YeuCauKhachHang;
class LoaiBDSController extends Controller
{
	public function getDanhsach(){
		$loaibds=LoaiBatDongSan::all();
		return view('admin/loaibatdongsan/danhsach',['loaibds'=>$loaibds]);
	}
	public function getThem(){
		return view('admin/loaibatdongsan/them');
	}
	public function postThem(Request $req){
		$this->validate($req,
			[

				'tenloai' => 'required|unique:loai_bds',
			],
			[
				'tenloai.required' => 'Bạn chưa nhập tên loại',
				'tenloai.unique' => 'Tên loại đã tồn tại',
			]);
		$loaibds = new LoaiBatDongSan;
		$loaibds->tenloai=$req->tenloai;
		$loaibds->save();
		return redirect()->back()->with('thongbao','Thêm thành công');
	}
	public function getXoa($id)
	{
		$bds=BatDongSan::Where('loaiid',$id)->count();
		$yeucau=YeuCauKhachHang::Where('loaiid',$id)->count();
		if($bds==0 && $yeucau==0)
		{
			$loaibds=LoaiBatDongSan::find($id);
			$loaibds->delete();
			return redirect()->back()->with('thongbao','Xóa thành công');
		}
		else
		{
			return redirect()->back()->with('thongbao','Xóa thất bại');
		}

	}
	public function getSua($id){
		$loaibds=LoaiBatDongSan::find($id);
		return view('admin/loaibatdongsan/sua',['loaibds'=>$loaibds]);
	}
	public function postSua(Request $req, $id){
		$this->validate($req,
			[

				'tenloai' => 'required|unique:loai_bds',
			],
			[
				'tenloai.required' => 'Bạn chưa nhập tên loại',
				'tenloai.unique' => 'Tên loại đã tồn tại',
			]);
		$loaibds =LoaiBatDongSan::find($id);
		$loaibds->tenloai=$req->tenloai;
		$loaibds->save();
		return redirect()->back()->with('thongbao','Sửa thành công');
	}
}
