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

class KyGuiController extends Controller
{
    public function getDanhsach(){
    	$danhsach = HopDongKyGui::all();

    	return view('admin/hopdongkygui/danhsach',compact('danhsach'));
    }

    public function getThem(){
    	$khachhang = KhachHang::all();
    	$batdongsan = BatDongSan::all();

    	return view('admin/hopdongkygui/them',compact('khachhang','batdongsan'));
    }

    public function postThem(Request $req){
    	$this->validate($req,
			[
				'giatri'=>'required|numeric|min:0',
				'chiphidv'=>'required|numeric|min:0',
				'trangthai'=>'required|numeric',
				'ngayketthuc'=>'after:ngaybatdau',
			],
			[
				'giatri.required'=>'Chưa nhập giá trị',
				'giatri.numeric'=>'Giá trị không hợp lệ',
				'giatri.min'=>'Giá trị phải lớn hơn 0',
				'chiphidv.required'=>'Chưa nhập chi phí dịch vsụ',
				'chiphidv.numeric'=>'Chi phí dịch vụ không hợp lệ',
				'chiphidv.min'=>'Chi phí dịch vụ phải lớn hơn 0',
				'trangthai.required'=>'Chưa nhập trạng thái',
				'trangthai.numeric'=>'Trạng thái không hợp lệ',
				'ngayketthuc.after'=>'Ngày bắt đầu của hợp đồng ký gửi phải trước ngày kết thúc'
			]);
		//dd($req);
		//date_default_timezone_set('Asia/Ho_Chi_Minh');
//			$date= date('Y-m-d H:i:s');
			$hdkg = new HopDongKyGui;
			$hdkg->khid=$req ->khid;
			$hdkg->bdsid=$req ->bdsid;
			$hdkg->giatri=$req ->giatri;
			$hdkg->chiphidv=$req ->chiphidv;
			$hdkg->ngaybatdau=$req ->ngaybatdau;
			$hdkg->ngayketthuc=$req ->ngayketthuc;
			$hdkg->trangthai=$req ->trangthai;
//			$hdkg->created_at=$req ->$date;
			$hdkg->save();
			return redirect()->back()->with('thongbao','Thêm thành công');
    }

    public function getXoa($id)
	{
		$kygui=HopDongKyGui::find($id);
        $kygui->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
	}

	public function getSua($id)
	{
		$hopdongkygui=HopDongKyGui::find($id);
		$khachhang=KhachHang::all();
		$batdongsan = BatDongSan::all();
		return view('admin/hopdongkygui/sua',compact('hopdongkygui','khachhang','batdongsan'));
	}

	public function postSua(Request $req ,$id)
	{
		$this->validate($req,
			[
				'giatri'=>'required|numeric|min:0',
				'chiphidv'=>'required|numeric|min:0',
				'trangthai'=>'|numeric|numeric',
				'ngayketthuc'=>'after:ngaybatdau',
			],
			[
				'giatri.required'=>'Chưa nhập giá trị',
				'giatri.numeric'=>'Giá trị không hợp lệ',
				'giatri.min'=>'Giá trị phải lớn hơn 0',
				'chiphidv.required'=>'Chưa nhập chi phí dịch vụ',
				'chiphidv.numeric'=>'Chi phí dịch vụ không hợp lệ',
				'chiphidv.min'=>'Chi phí dịch vụ phải lớn hơn 0',
				'trangthai.required'=>'Chưa nhập trạng thái',
				'trangthai.numeric'=>'Trạng thái không hợp lệ',
				'ngayketthuc.after'=>'Ngày bắt đầu của hợp đồng ký gửi phải trước ngày kết thúc'
			]);
			$hdkg = new HopDongKyGui;
			$hdkg->khid=$req ->khid;
			$hdkg->bdsid=$req ->bdsid;
			$hdkg->giatri=$req ->giatri;
			$hdkg->chiphidv=$req ->chiphidv;
			$hdkg->ngaybatdau=$req ->ngaybatdau;
			$hdkg->ngayketthuc=$req ->ngayketthuc;
			$hdkg->trangthai=$req ->trangthai;
//			$hdkg->created_at=$req ->$date;
			$hdkg->save();
			return redirect()->back()->with('thongbao','Cập nhật thành công');
	}
}
