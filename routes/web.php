<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
	return view('welcome');
});

// Route::get('Huykhang', function () {
// 	return "Xin chao cac ban";
// });

//Truyen tham so
Route::get('Hoten/{ten}', function ($ten) {
	echo "Ten ban la :" . $ten;
});

Route::get('Ngaythang/{ngay}', function ($ngay) {
	echo "Hom nay ngay :" . $ngay;
})->where(['ngay' => '[0-9a-zA-Z]{5}']);

//Dinh danh
Route::get('route1', ['as' => 'myroute', function () {
	echo "Xin chao cac ban";
}]);

Route::get('route2', function () {
	echo "hello everybody";
})->name('myroute2');

Route::get('goiten', function () {
	return redirect()->route('myroute2');
});

//route group bai 7

//admin
Route::get('Admin', function () {
	return view('admin.layouts.index');
});
Route::get('admin/dangnhap', 'UserController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangnhapAdmin');
Route::get('admin/logout', 'UserController@getDangxuatAdmin');

//Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

Route::group(['prefix' => 'admin'], function () {

	Route::group(['prefix' => 'user'], function () {
		//admin/user/danhsach
		Route::get('danhsach', 'UserController@getDanhsach');
		Route::post('danhsach', 'UserController@postDanhsach');
		//admin/user/sua
		Route::get('sua/{id}', 'UserController@getSua');
		Route::post('sua/{id}', 'UserController@postSua');
		//admin/user/them
		Route::get('them', 'UserController@getThem');
		Route::post('them', 'UserController@postThem');
		//admin/user/xoa
		Route::get('xoa/{id}', 'UserController@getXoa');
	});

	Route::group(['prefix' => 'khachhang'], function () {
		//admin/khachhang/danhsach
		Route::get('danhsach', 'KhachhangController@getDanhsach');
		Route::post('danhsach', 'KhachhangController@postDanhsach');
		//admin/khachhang/sua
		Route::get('sua', 'KhachhangController@getSua');
		Route::post('sua', 'KhachhangController@postSua');
		//admin/khachhang/them
		Route::get('them', 'KhachhangController@getThem');
		Route::post('them', 'KhachhangController@postThem');
		//admin/khachhang/xoa
		Route::get('xoa', 'KhachhangController@getXoa');
	});

	Route::group(['prefix'=>'loaibatdongsan'],function(){
		Route::get('danhsach','LoaiBDSController@getDanhsach');
		Route::get('them','LoaiBDSController@getThem');
		Route::post('them','LoaiBDSController@postThem');
		Route::get('xoa/{id}','LoaiBDSController@getXoa');
		Route::get('sua/{id}','LoaiBDSController@getSua');
		Route::post('sua/{id}','LoaiBDSController@postSua');
	});

	Route::group(['prefix'=>'batdongsan'],function(){
		Route::get('danhsach','BatDongSanController@getDanhsach');
		Route::get('them','BatDongSanController@getThem');
		Route::post('them','BatDongSanController@postThem');
		Route::get('xoa/{id}','BatDongSanController@getXoa');
		Route::get('sua/{id}','BatDongSanController@getSua');
		Route::post('sua/{id}','BatDongSanController@postSua');
	});

	Route::group(['prefix'=>'hinhanh'],function(){
		Route::get('danhsach','HinhAnhController@getDanhsach');
		Route::get('them','HinhAnhController@getThem');
		Route::post('them','HinhAnhController@postThem');
		Route::get('xoa/{id}','HinhAnhController@getXoa');
		Route::get('sua/{id}','HinhAnhController@getSua');
		Route::post('sua/{id}','HinhAnhController@postSua');
	});

	Route::group(['prefix'=>'hopdongkygui'],function(){
		Route::get('danhsach','KyGuiController@getDanhsach');
		Route::get('them','KyGuiController@getThem');
		Route::post('them','KyGuiController@postThem');
		Route::get('xoa/{id}','KyGuiController@getXoa');
		Route::get('sua/{id}','KyGuiController@getSua');
		Route::post('sua/{id}','KyGuiController@postSua');
		Route::get('search','KyGuiController@getSearch');
		Route::get('tracuu','KyGuiController@getTracuu');
	});

	Route::group(['prefix'=>'hopdongchuyennhuong'],function(){
		Route::get('danhsach','ChuyenNhuongController@getDanhsach');
		Route::get('them','ChuyenNhuongController@getThem');
		Route::post('them','ChuyenNhuongController@postThem');
		Route::get('xoa/{id}','ChuyenNhuongController@getXoa');
		Route::get('sua/{id}','ChuyenNhuongController@getSua');
		Route::post('sua/{id}','ChuyenNhuongController@postSua');
		Route::get('search','ChuyenNhuongController@getSearch');
		Route::get('tracuu','ChuyenNhuongController@getTracuu');
	});

	Route::group(['prefix'=>'hopdongdatcoc'],function(){
		Route::get('danhsach','DatCocController@getDanhsach');
		Route::get('them','DatCocController@getThem');
		Route::post('them','DatCocController@postThem');
		Route::get('xoa/{id}','DatCocController@getXoa');
		Route::get('sua/{id}','DatCocController@getSua');
		Route::post('sua/{id}','DatCocController@postSua');
		Route::get('search','DatCocController@getSearch');
		Route::get('tracuu','DatCocController@getTracuu');
	});
});