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

class DatCocController extends Controller
{
    public function getDanhsach(){
    	$danhsach = HopDongDatCoc::all();

    	return view('admin/hopdongdatcoc/danhsach',compact('danhsach'));
    }

    public function getThem(){
    	$khachhang = KhachHang::all();
    	$batdongsan = BatDongSan::all();

    	return view('admin/hopdongdatcoc/them',compact('khachhang','batdongsan'));
    }

    public function postThem(Request $req){
    	$this->validate($req,
			[
				'giatri'=>'required|numeric|min:0',
				'tinhtrang'=>'required|numeric',
				'trangthai'=>'required|numeric',
			],
			[
				'giatri.required'=>'Chưa nhập giá trị',
				'giatri.numeric'=>'Giá trị không hợp lệ',
				'giatri.min'=>'Giá trị phải lớn hơn 0',
				'tinhtrang.required'=>'Chưa nhập tình trạng',
				'tinhtrang.numeric'=>'Tình trạng không hợp lệ',
				'trangthai.required'=>'Chưa nhập trạng thái',
				'trangthai.numeric'=>'Trạng thái không hợp lệ',
			]);
		//dd($req);
		//date_default_timezone_set('Asia/Ho_Chi_Minh');
//			$date= date('Y-m-d H:i:s');
			$hddc = new HopDongDatCoc;
			$hddc->khid=$req ->khid;
			$hddc->bdsid=$req ->bdsid;
			$hddc->giatri=$req ->giatri;
			$hddc->tinhtrang=$req ->tinhtrang;
			$hddc->ngaylaphd=$req ->ngaylaphd;
			$hddc->ngayhethan=$req ->ngayhethan;
			$hddc->trangthai=$req ->trangthai;
//			$hdkg->created_at=$req ->$date;
			$hddc->save();
			return redirect()->back()->with('thongbao','Thêm thành công');
    }

    public function getXoa($id)
	{
		$chuyennhuong=HopDongChuyenNhuong::Where('dcid',$id)->count();
		if($chuyennhuong==0)
		{
			$datcoc=HopDongDatCoc::find($id);
			$datcoc->delete();
			return redirect()->back()->with('thongbao','Xóa thành công');
		}
		else
		{
			return redirect()->back()->with('thongbao','Xóa thất bại');
		}
	}
	public function getSua($id)
	{
		$hopdongdatcoc = HopDongDatCoc::find($id);
		$khachhang = KhachHang::all();
		$batdongsan = BatDongSan::all();
		return view('admin/hopdongdatcoc/sua',compact('hopdongdatcoc','khachhang','batdongsan'));
	}

	public function postSua(Request $req ,$id)
	{
		$this->validate($req,
			[
				'giatri'=>'required|numeric|min:0',
				'tinhtrang'=>'required|numeric',
				'trangthai'=>'required|numeric',
			],
			[
				'giatri.required'=>'Chưa nhập giá trị',
				'giatri.numeric'=>'Giá trị không hợp lệ',
				'giatri.min'=>'Giá trị phải lớn hơn 0',
				'tinhtrang.required'=>'Chưa nhập tình trạng',
				'tinhtrang.numeric'=>'Tình trạng không hợp lệ',
				'trangthai.required'=>'Chưa nhập trạng thái',
				'trangthai.numeric'=>'Trạng thái không hợp lệ',
			]);
		//dd($req);
		//date_default_timezone_set('Asia/Ho_Chi_Minh');
//			$date= date('Y-m-d H:i:s');
			$hddc = new HopDongDatCoc;
			$hddc->khid=$req ->khid;
			$hddc->bdsid=$req ->bdsid;
			$hddc->giatri=$req ->giatri;
			$hddc->tinhtrang=$req ->tinhtrang;
			$hddc->ngaylaphd=$req ->ngaylaphd;
			$hddc->ngayhethan=$req ->ngayhethan;
			$hddc->trangthai=$req ->trangthai;
//			$hdkg->created_at=$req ->$date;
			$hddc->save();
			return redirect()->back()->with('thongbao','Thêm thành công');
    }

}
