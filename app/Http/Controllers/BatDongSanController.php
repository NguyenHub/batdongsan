<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BatDongSan;
use App\KhachHang;
use App\LoaiBatDongSan;
class BatDongSanController extends Controller
{
	public function getDanhsach(){
		$batdongsan=BatDongSan::all();
		return view('admin/batdongsan/danhsach',['batdongsan'=>$batdongsan]);
	}
	public function getThem(){
		$loaibds=LoaiBatDongSan::all();
		$khachhang=KhachHang::all();
		return view('admin/batdongsan/them',['loaibds'=>$loaibds,'khachhang'=>$khachhang]);
	}
	public function postThem(Request $req){
		$this->validate($req,
			[
				'chieudai'=>'required|numeric|min:0',
				'chieurong'=>'required|numeric|min:0',
				'dientich'=>'required|numeric|min:0',
				'dongia'=>'required|numeric|min:0',
				'masoqsdd'=>'required',
				'huehong'=>'required|numeric|min:0',
				'tenduong'=>'required',
				'sonha'=>'required',
				'phuong'=>'required',
				'quan'=>'required',
				'thanhpho'=>'required|alpha',
			],
			[
				'chieudai.required'=>'Chưa nhập chiều dài',
				'chieudai.numeric'=>'Chiều dài không hợp lệ',
				'chieudai.min'=>'Chiều dài phải >0',
				'chieurong.required'=>'Chưa nhập chiều rộng',
				'chieurong.numeric'=>'Chiều rộng không hợp lệ',
				'chieurong.min'=>'Chiều rộng phải >0',
				'dientich.required'=>'Chưa nhập diện tích',
				'dientich.numeric'=>'Diện tích không hợp lệ',
				'dientich.min'=>'Chiều rộng phải >0',
				'dongia.required'=>'Chưa nhập đơn giá',
				'dongia.numeric'=>'Đơn giá không hợp lệ',
				'dongia.min'=>'Đơn giá phải >0',
				'masoqsdd.required'=>'Chưa nhập Mã qsdd',
				'huehong.required'=>'Chưa nhập hoa hồng',
				'huehong.numeric'=>'Hoa hồng không hợp lệ',
				'huehong.min'=>'Hoa hồng phải >0',
				'tenduong.required'=>'Chưa nhập tên đường',
				'sonha.required'=>'Chưa nhập số nhà',
				'phuong.required'=>'Chưa nhập phường',
				'quan.required'=>'Chưa nhập quận',
				'thanhpho.required'=>'Chưa nhập thành phố',
				'thanhpho.alpha'=>'Thành phố không hợp lệ',
			]);
		//dd($req);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date= date('Y-m-d H:i:s');
			$bds = new BatDongSan;
			$bds->tinhtrang=$req ->tinhtrang;
			$bds->dientich=$req ->dientich;
			$bds->dongia=$req ->dongia;
			$bds->chieudai=$req ->chieudai;
			$bds->chieurong=$req ->chieurong;
			$bds->masoqsdd=$req ->masoqsdd;
			$bds->mota=$req ->mota;
			$bds->huehong=$req ->huehong;
			$bds->tenduong=$req ->tenduong;
			$bds->sonha=$req ->sonha;
			$bds->phuong=$req ->phuong;
			$bds->quan=$req ->quan;
			$bds->thanhpho=$req ->thanhpho;
			$bds->loaiid=$req ->tinhtrang;
			$bds->khid=$req ->khid;
			$bds->created_at=$req ->$date;
			$bds->save();
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
	public function postSua(Request $req){
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
}
