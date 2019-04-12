<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HinhAnh;
use App\BatDongSan;
class HinhAnhController extends Controller
{
    public function getDanhSach(){
    	$hinhanh=HinhAnh::all();
    	return view('admin/hinhanh/danhsach',['hinhanh'=>$hinhanh]);
    }
    public function getThem(){
    	$batdongsan=BatDongSan::get('id');
    	return view('admin/hinhanh/them',['batdongsan'=>$batdongsan]);
    }
    public function postThem(Request $request){
    	$this->validate($request, [
            'file' => 'required',
            'file' => 'image:jpg,png,gif'
        ],
        [
            'file.required' => 'Chưa chọn file',
            'file.image' => 'Không đúng định dạng hình ảnh'
        ]);
        if($request->hasfile('file'))
        {
          $files=$request->file('file');
          foreach($files as $file)
          {
            $name=$file->getClientOriginalName();
            $file->move('hinhanh/upload/',$name);  
            $file= new HinhAnh();
            $file->hinh=$name;
            $file->bdsid=$request->bdsid;
            $file->save();
        }
    }
    return back()->with('thongbao', 'Thêm thành công');

    
    	// $imageName=$request->file->getClientOriginalName();
    	// $request->file->move(public_path('upload'),$imageName);
    	// return response()->json(['uploaded'=>'/upload/'.$imageName]);
    	//dd($request);
}
    public function getXoa($id){
        $hinh=HinhAnh::find($id);
        $hinh->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
     public function getSua($id){
        $hinh=HinhAnh::find($id);
        return view('admin/hinhanh/sua',['hinh'=>$hinh]);
    }
    public function postSua(Request $req, $id){
        $this->validate($req, [
            'file' => 'required',
            'file' => 'image:jpg,png,gif'
        ],
        [
            'file.required' => 'Chưa chọn file',
            'file.image' => 'Không đúng định dạng hình ảnh'
        ]);
        if($req->hasfile('file'))
        {
            $file=$req->file('file');
            $name=$file->getClientOriginalName();
            $file->move('hinhanh/upload/',$name);  
            $file=HinhAnh::find($id);
            $file->hinh=$name;
            $file->save();
        }
        return redirect()->back()->with('thongbao','Cập nhật thành công');
    }
}
