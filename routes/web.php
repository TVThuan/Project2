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


Route::get("admin/dangnhap","UserController@getdangnhapAdmin")->name('login');
Route::post("admin/dangnhap","UserController@postdangnhapAdmin");
Route::get("admin/logout","UserController@getDangXuatAdmin");

Route::group(['prefix' => 'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix' => 'chuyenNganh'],function(){
		Route::get('danhSach','chuyenNganhController@getDanhSach')->name('danhSach');
		Route::get('them',function(){
			return view('admin.chuyenNganh.them');
		});
	
		Route::get('sua/{maCN}','chuyenNganhController@getById');
		Route::post('sua/up','chuyenNganhController@updateChuyenNganh');
		Route::post('them','chuyenNganhController@insert')->name('themCn');
		Route::get('xoa/{maCN}','chuyenNganhController@deleteChuyenNganh');
	});
	

		
	Route::group(['prefix' => 'mon'],function(){
		Route::get('danhSach','monController@getDanhSach');
		Route::get('sua/{maMon}','monController@getById');
		Route::post('sua/{maMon}','monController@updateMon');
		Route::get('them',function(){
			return view('admin.mon.them');
		});
		Route::post('them','monController@insert');
		Route::get('them','monController@getDanhSachCN');
		Route::get('xoa/{maMon}','monController@deleteMon');
	});


		
	Route::group(['prefix' => 'sinhVien'],function(){	
		Route::get('danhSach','sinhVienController@getDanhSach');
		Route::get('sua/{maSv}','sinhVienController@getById');
		Route::post('sua/{maSv}','sinhVienController@updateSv');
		Route::get('diem/{maSv}','sinhVienController@getByIddiem');
		Route::get('them',function(){
			return view('admin.sinhVien.them');
		});
		Route::post('them','sinhVienController@insert');
		Route::get('them','sinhVienController@getDanhSachLop');
	
		Route::get('xoa/{maSv}','sinhVienController@deleteSv');
	});

	Route::group(['prefix' => 'taiKhoan'],function(){	
		
		Route::get('sua/{maSv}','UserController@getById');
		Route::post('sua/{maSv}','UserController@UpdateTK');
	});

	Route::group(['prefix' => 'lop'],function(){	
		Route::get('danhSach','lopController@getDanhSach');
		Route::get('sua/{maLop}','lopController@getById');
		Route::post('sua/{maLop}','lopController@updateLop');
		

		Route::get('them','lopController@getDanhSachCN');
		Route::post('them','lopController@insert')->name('themLop');
		Route::get('xoa/{maLop}','lopController@deleteLop');
		
	});

	Route::group(['prefix' => 'khoa'],function(){
		Route::get('danhSach','khoaController@getDanhSach');

		Route::get('sua/{maKhoa}','khoaController@getById');
		Route::post('sua/{maKhoa}','khoaController@updateKhoa');
		Route::get('them',function(){
			return view('admin.khoa.them');
		});
		Route::post('them','khoaController@insert');
		Route::get('xoa/{maKhoa}','khoaController@deleteKhoa');

	});



	Route::group(['prefix' => 'diem'],function(){
		Route::get('danhSach','diemController@getDanhSach');
		Route::get('danhSachDiem','diemController@getDanhSachDiem');

		Route::get('sua/{maSv}/{maMon}','diemController@getByIddiemsv');
		Route::post('sua/{maSv}/{maMon}','diemController@updatediem')->name('get_postsuaDiem');

		
		Route::get('them','diemController@getAll');
		Route::get('themdiem/{maSv}','diemController@diem');
		Route::get('thongke','diemController@thongke');
		Route::get('inPhieuDiem/{maSv}','diemController@in');
		Route::post('themdiem','diemController@insertdiem')->name('themdiem');

		Route::post('them','diemController@insertdiemc1')->name('themdiemc1');

		Route::post('themdiem2','diemController@insertdiemc2')->name('themdiemc2');

		Route::get('xoa/{maSv}/{id}','diemController@deletediem');
	});
	Route::group(['prefix' => 'taikhoan'],function(){
		Route::get('danhSach','UserController@getDanhSach');
	});

	Route::group(['prefix' => 'dashboard'],function(){
		Route::get('danhSach',function(){
			return view('admin.baocao.baocao');
		});
	});

});



Route::group(['prefix' => 'Ajax'], function(){
	Route::get('getLop','AjaxController@getLop');
	Route::get('getSv','AjaxController@getSv');
	Route::get('get_diem_sv','AjaxController@get_diem_sv');
});


Route::get('sinhVien/dangnhap','PagesController@getdangnhap');
Route::post('sinhVien/dangnhap','PagesController@postdangnhap');
Route::get('sinhVien/dangxuat','PagesController@getdangxuat');

Route::group(['prefix' => 'sinhVien','middleware'=>'sinhVien'],function(){
	Route::group(['prefix' => 'trangchu'],function(){
		Route::get('doimatkhau','PagesController@getdoimatkhau');
		Route::get('thongtincanhan/{maSv}','PagesController@getthongtincanhan');
		Route::post('thongtincanhan/{maSv}','PagesController@postthongtincanhan')->name('upsinhvien');
		Route::get('diem/{maSv}','PagesController@diem');
	});
});
