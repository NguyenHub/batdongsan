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

class DatCocController extends Controller
{
    public function getDanhsach(){
    	$danhsach = HopDongDatCoc::all();

    	return view('admin/hopdongdatcoc/danhsach',compact('danhsach'));
    }

    public function getThem(){
    	$khachhang = KhachHang::all();
    	$batdongsan = BatDongSan::all();
    	$hopdongdatcoc = HopDongDatCoc::all();

    	if($hopdongdatcoc->count() > 0)
			foreach ($hopdongdatcoc as $value)
			{
				$bdsidtam[] = $value->bdsid;
			}
		else $bdsidtam[] = 0;

    	if($batdongsan->count() > 0 ){
			foreach ($batdongsan as $value) 
			{	
				$khidtam[] = $value->khid;
			}
		}
		else $khidtam[] = 0;

    	return view('admin/hopdongdatcoc/them',compact('khachhang','batdongsan','hopdongdatcoc','bdsidtam','khidtam'));
    }

    public function postThem(Request $req){

    	$postbdsid = $_POST['bdsid'];
    	$bds = BatDongSan::find($postbdsid);
    	$bds->dongia;

    	$hopdongkygui = HopDongKyGui::all();

//		$reqbdsid = $req->bdsid;
//    	$ngaykthdkg = HopDongKyGui::Where('bdsid',$reqbdsid)->first();
//    	$ngaykthdkg = $ngaykthdkg->ngayketthuc;
//    	$a = $_POST['ngayhethan'];
//    	$b = $req->ngayhethan;
//    	if($ngaykthdkg > $b)
//    		echo 1;
//    	else echo 0;
//    	dd($a,$b,$ngaykthdkg,$req->ngayhethan);


    	$this->validate($req,
			[
				'giatri'=>'required|numeric|max:bds',
				'tinhtrang'=>'required|numeric',
//				'ngayhethan'=>'before:ngaykthdkg',
				'trangthai'=>'required|numeric',
			],
			[
				'giatri.required'=>'Chưa nhập giá trị',
				'giatri.numeric'=>'Giá trị không hợp lệ',
				'giatri.max'=>'Giá trị phải bé hơn hoặc bằng giá trị bất động sản',
				'tinhtrang.required'=>'Chưa nhập tình trạng',
				'tinhtrang.numeric'=>'Tình trạng không hợp lệ',
				'trangthai.required'=>'Chưa nhập trạng thái',
				'trangthai.numeric'=>'Trạng thái không hợp lệ',
//				'ngayhethan.before'=>'Ngày hết hạn hđ đặt cọc phải trước ngày kết thúc hđ ký gửi',
			]);
		//dd($req);
		//date_default_timezone_set('Asia/Ho_Chi_Minh');
//			$date= date('Y-m-d H:i:s');
    	foreach ($hopdongkygui as $value) {
    		if($value->bdsid == $req->bdsid)
    		{
				$hddc = new HopDongDatCoc;
				$date = Carbon::now();
				$date->toDateString();
				$hddc->khid=$req ->khid;
				$hddc->bdsid=$req ->bdsid;
				$hddc->giatri=$req ->giatri;
				$hddc->tinhtrang=$req ->tinhtrang;
				$hddc->ngaylaphd=$date;
				$hddc->ngayhethan=$req ->ngayhethan;
				$hddc->trangthai=$req ->trangthai;
	//			$hdkg->created_at=$req ->$date;
				$hddc->save();
				return redirect()->back()->with('thongbao','Thêm thành công');
			}
		}
		return redirect()->back()->with('thongbao','Thêm thất bại');
    	//hợp đồng đặt cọc được thêm chỉ sau khi bds đã được thêm ở hđ ký gửi
    }

    public function getXoa($id)
	{
		$chuyennhuong=HopDongChuyenNhuong::Where('dcid',$id)->count();
		$datcoc = HopDongDatCoc::find($id);
		if($chuyennhuong==0 && $datcoc->giatri == 0)
		{
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
			$hddc =HopDongDatCoc::find($id);
			$hddc->khid=$req ->khid;
			$hddc->bdsid=$req ->bdsid;
			$hddc->giatri=$req ->giatri;
			$hddc->tinhtrang=$req ->tinhtrang;
			$hddc->ngaylaphd=$req ->ngaylaphd;
			$hddc->ngayhethan=$req ->ngayhethan;
			$hddc->trangthai=$req ->trangthai;
//			$hdkg->created_at=$req ->$date;
			$hddc->save();
			return redirect()->back()->with('thongbao','Sửa thành công');
    }

    public function getSearch(Request $req){
		$hopdongdatcoc = HopDongDatCoc::where('id','like',$req->key)->get();

		$this->validate($req,[
			'key' => 'required|numeric|min:0',
		],
		[
			'key.required' => 'Chưa nhập thông tin',
			'key.numeric' => 'ID phải là số',
			'key.min' => 'ID phải lớn hơn hoặc bằng 0',
		]);

		if(!isset($hopdongdatcoc[0]['id']))
		{
			$loi = 1;
			return view('admin/hopdongdatcoc/tracuu',compact('loi'));
		}
		else
			return view('admin/hopdongdatcoc/thongtintracuu',compact('hopdongdatcoc'));
	}

	public function getTracuu(){

		$loi = 0;

		return view('admin/hopdongdatcoc/tracuu',compact('loi'));
	}

}




