<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\BatDongSan;
use App\KhachHang;
use App\LoaiBatDongSan;
use App\YeuCauKhachHang;
use App\HopDongKyGui;
use App\HopDongDatCoc;
use App\HopDongChuyenNhuong;

class ChuyenNhuongController extends Controller
{
    public function getDanhsach(){
    	$danhsach = HopDongChuyenNhuong::all();

    	return view('admin/hopdongchuyennhuong/danhsach',compact('danhsach'));
    }

    public function getThem(){
    	$khachhang = KhachHang::all();
    	$batdongsan = BatDongSan::all();
    	$datcoc = HopDongDatCoc::all();

    	return view('admin/hopdongchuyennhuong/them',compact('khachhang','batdongsan','datcoc'));
    }

    public function postThem(Request $req){
    	$this->validate($req,
			[
				'giatri'=>'required|numeric|min:0',
				'trangthai'=>'required|numeric',
			],
			[
				'giatri.required'=>'Chưa nhập giá trị',
				'giatri.numeric'=>'Giá trị không hợp lệ',
				'giatri.min'=>'Giá trị phải lớn hơn 0',
				'trangthai.required'=>'Chưa nhập trạng thái',
				'trangthai.numeric'=>'Trạng thái không hợp lệ',
			]);
		//dd($req);
		//date_default_timezone_set('Asia/Ho_Chi_Minh');
//			$date= date('Y-m-d H:i:s');
			$hdcn = new HopDongChuyenNhuong;
			$hdcn->khid=$req ->khid;
			$hdcn->bdsid=$req ->bdsid;
			$hdcn->dcid=$req ->dcid;
			$hdcn->giatri=$req ->giatri;
			$hdcn->ngaylap=$req ->ngaylap;
			$hdcn->trangthai=$req ->trangthai;
//			$hdkg->created_at=$req ->$date;
			$hdcn->save();
			return redirect()->back()->with('thongbao','Thêm thành công');
    }

    public function getXoa($id)
	{
		$chuyennhuong=HopDongChuyenNhuong::find($id);
        $chuyennhuong->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
	}

	public function getSua($id)
	{
		$hopdongchuyennhuong = HopDongChuyenNhuong::find($id);
		$khachhang = KhachHang::all();
		$batdongsan = BatDongSan::all();
		$hopdongdatcoc = HopDongDatCoc::all();
		return view('admin/hopdongchuyennhuong/sua',compact('hopdongchuyennhuong','khachhang','batdongsan','hopdongdatcoc'));
	}

	public function postSua(Request $req ,$id)
	{
		$this->validate($req,
			[
				'giatri'=>'required|numeric|min:0',
				'trangthai'=>'required|numeric',
			],
			[
				'giatri.required'=>'Chưa nhập giá trị',
				'giatri.numeric'=>'Giá trị không hợp lệ',
				'giatri.min'=>'Giá trị phải lớn hơn 0',
				'trangthai.required'=>'Chưa nhập trạng thái',
				'trangthai.numeric'=>'Trạng thái không hợp lệ',
			]);
//		dd($req);
		//date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date= date('Y-m-d H:i:s');
			$hdcn = new HopDongChuyenNhuong;
			$hdcn->khid=$req ->khid;
			$hdcn->bdsid=$req ->bdsid;
			$hdcn->dcid=$req ->dcid;
			$hdcn->giatri=$req ->giatri;
			$hdcn->ngaylap=$req ->ngaylap;
			$hdcn->trangthai=$req ->trangthai;
//			$hdkg->created_at=$req ->$date;
			$hdcn->save();
			return redirect()->back()->with('thongbao','Thêm thành công');
    }

}
