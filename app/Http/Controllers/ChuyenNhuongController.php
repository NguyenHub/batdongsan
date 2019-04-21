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
use Carbon\Carbon;

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
    	$hopdongchuyennhuong = HopDongChuyenNhuong::all();
    	$hopdongdatcoc = HopDongDatCoc::all();

    	if($hopdongchuyennhuong->count() > 0)
			foreach ($hopdongchuyennhuong as $value)
			{
				$bdsidtam[] = $value->bdsid;
			}
		else $bdsidtam[] = 0;

		if($hopdongchuyennhuong->count() > 0)
			foreach ($hopdongchuyennhuong as $value) 
			{
				$hddcidtam[] = $value->dcid;
			}
		else $hddcidtam[] = 0;

    	return view('admin/hopdongchuyennhuong/them',compact('khachhang','batdongsan','datcoc','bdsidtam','hddcidtam'));
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
			$date = Carbon::now();
			$date->toDateString();
			$hdcn->khid=$req ->khid;
			$hdcn->bdsid=$req ->bdsid;
			$hdcn->dcid=$req ->dcid;
			$hdcn->giatri=$req ->giatri;
			$hdcn->ngaylap=$date;
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
			$hdcn =HopDongChuyenNhuong::find($id);
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


    public function getSearch(Request $req){
		$hopdongchuyennhuong = HopDongChuyenNhuong::where('id','like',$req->key)->get();

		$this->validate($req,[
			'key' => 'required|numeric|min:0',
		],
		[
			'key.required' => 'Chưa nhập thông tin',
			'key.numeric' => 'ID phải là số',
			'key.min' => 'ID phải lớn hơn hoặc bằng 0',
		]);

		if(!isset($hopdongchuyennhuong[0]['id']))
		{
			$loi = 1;
			return view('admin/hopdongchuyennhuong/tracuu',compact('loi'));
		}
		else

		return view('admin/hopdongchuyennhuong/thongtintracuu',compact('hopdongchuyennhuong'));
	}

	public function getTracuu(){

		$loi = 0;

		return view('admin/hopdongchuyennhuong/tracuu',compact('loi'));
	}

}
