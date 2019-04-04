<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	//
	public function getDanhsach() {
		$user = User::all();
		return view('admin.user.danhsach', ['user' => $user]);
	}

	public function getThem() {
		return view('admin.user.them');
	}

	public function postThem(Request $request) {
		$this->validate($request,
			[
				'taikhoan' => 'required|min:6',
				'password' => 'required|min:6|max:100',
				'nhaplaipassword' => 'required|same:password',
				'tennv' => 'required',
				'sdt' => 'required',
				'diachi' => 'required',
				'ngaysinh' => 'required',
				'doanhthu' => 'required',
				'email' => 'required|email|unique:users,email',
			],
			[
				'taikhoan.required' => 'Bạn chưa nhập tài khoản',
				'taikhoan.min' => 'Phải có ít nhất 6 ký tự',
				'password.required' => 'Bạn chưa nhập mật khẩu',
				'password.min' => 'Phải có ít nhất 6 ký tự',
				'password.max' => 'Phải có tối đa 100 ký tự',
				'nhaplaipassword.required' => 'Bạn chưa nhập mật khẩu',
				'nhaplaipassword.same' => 'Nhập lại mật khẩu không trùng',
				'name.required' => 'Bạn chưa nhập họ và tên',
				'phone.required' => 'Bạn chưa nhập số điện thoại',
				'diachi.required' => 'Bạn chưa nhập địa chỉ',
				'ngaysinh.required' => 'Bạn chưa nhập ngày sinh',
				'doanhthu.required' => 'Bạn chưa nhập doanh thu',
				'email.required' => 'Bạn chưa nhập email',
				'email.email' => 'Đây không phải là email',
				'email.unique' => 'Email đã tồn tại',
			]);

		$user = new User;
		$user->taikhoan = $request->taikhoan;
		$user->password = bcrypt($request->password);
		$user->tennv = $request->tennv;
		$user->sdt = $request->sdt;
		$user->diachi = $request->diachi;
		$user->ngaysinh = $request->ngaysinh;
		$user->gioitinh = $request->gioitinh;
		$user->doanhthu = $request->doanhthu;
		$user->email = $request->email;
		$user->quyen = $request->quyen;
		$user->save();

		return redirect('admin/user/them')->with('thongbao', 'Thêm thành công');
	}

	public function getSua($id) {
		$user = User::find($id);
		return view('admin.user.sua', ['user' => $user]);
	}

	public function postSua(Request $request, $id) {
		$this->validate($request,
			[

				'tennv' => 'required',
				'sdt' => 'required',
				'diachi' => 'required',
				'ngaysinh' => 'required',
				'doanhthu' => 'required',
			],
			[
				'name.required' => 'Bạn chưa nhập họ và tên',
				'phone.required' => 'Bạn chưa nhập số điện thoại',
				'diachi.required' => 'Bạn chưa nhập địa chỉ',
				'ngaysinh.required' => 'Bạn chưa nhập ngày sinh',
				'doanhthu.required' => 'Bạn chưa nhập doanh thu',

			]);
		$user = User::find($id);
		$user->tennv = $request->tennv;
		$user->gioitinh = $request->gioitinh;
		$user->sdt = $request->sdt;
		$user->diachi = $request->diachi;
		$user->ngaysinh = $request->ngaysinh;
		$user->doanhthu = $request->doanhthu;
		$user->email = $request->email;
		$user->quyen = $request->quyen;

		if ($request->changepassword == "on") {
			$this->validate($request,
				[
					'password' => 'required|min:6|max:100',
					'nhaplaipassword' => 'required|same:password',

				],
				[
					'password.required' => 'Bạn chưa nhập mật khẩu',
					'password.min' => 'Phải có ít nhất 6 ký tự',
					'password.max' => 'Phải có tối đa 100 ký tự',
					'nhaplaipassword.required' => 'Bạn chưa nhập mật khẩu',
					'nhaplaipassword.same' => 'Nhập lại mật khẩu không trùng',

				]);
			$user->password = bcrypt($request->password);
		}
		$user->save();
		return redirect('admin/user/danhsach')->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$user = User::find($id);
		$user->delete();
		return redirect('admin/user/danhsach')->with('thongbao', 'Xóa thành công');
	}

	public function getDangnhapAdmin() {
		return view('admin.login');
	}
	public function postDangnhapAdmin(Request $request) {
		$this->validate($request,
			[
				'email' => 'required',
				'password' => 'required|min:6|max:100',
			],
			[
				'email.required' => 'Bạn chưa nhập email',
				'password.required' => 'Bạn chưa nhập mật khẩu',
				'password.min' => 'Phải có ít nhất 6 ký tự',
				'password.max' => 'Phải có tối đa 100 ký tự',
			]);
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			return redirect('admin/user/danhsach');
		} else {
			return redirect('admin/danhnhap')->with('thongbao', 'Đăng nhập thất bại');
		}
	}

	public function getDangxuatAdmin() {
		Auth::logout();
		return redirect('admin/dangnhap');
	}
}
