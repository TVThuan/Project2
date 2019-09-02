<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHocModel;
use DB;
class khoaController extends Controller
{
    //lấy ra danh sách khóa học
    public function getDanhSach()
    {
    	$ds= KhoaHocModel::all();
    	return view('admin/khoa/danhSach',['ds'=>$ds]);
    }

    // thêm  khóa học
    public function insert(Request $request)
    {
       
      $this->validate($request,
        [
           
            'txtTen'=>'required|min:3|max:100|unique:tblKhoaHoc,tenKhoa',
        ],
        [
            'txtTen.required'=>'Bạn Chưa Nhập Tên Khóa',
            'txtTen.unique'=>'Đã Tồn Tại Khóa',
            'txtTen.min'=>'Tên Khóa Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.max'=>'Tên Khóa Phải Có Độ Dài Từ 3 đến 100 ký tự',
        ]);
        $tenKhoa=$request->txtTen;
        KhoaHocModel::insert($tenKhoa);
        return redirect('admin/khoa/them')->with('thongbao','Thêm Thành Công');
    }
    //lấy ra mã khóa
    public function getById($maKhoa)
    {
        $ds=KhoaHocModel::getById($maKhoa);
        return view("admin/khoa/sua",["ds"=>$ds]);
    }
    //sửa tên khóa học
    public function updateKhoa(Request $request)
    {
        $this->validate($request,
        [
           
            'txtTen'=>'required|min:3|max:100|unique:tblKhoaHoc,tenKhoa',
        ],
        [
            'txtTen.required'=>'Bạn Chưa Nhập Tên Khóa',
            'txtTen.unique'=>'Đã Tồn Tại Khóa',
            'txtTen.min'=>'Tên Khóa Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.max'=>'Tên Khóa Phải Có Độ Dài Từ 3 đến 100 ký tự',
        ]);

        
        $maKhoa = $request->txtMa;
        $tenKhoa=$request->txtTen;
        KhoaHocModel::updateKhoa($maKhoa,$tenKhoa);
        return redirect("admin/khoa/sua/".$maKhoa)->with('thongbao','Cập Nhật Thành Công');
    }
    // xóa khóa học
    public function deleteKhoa($maKhoa)
    {
        KhoaHocModel::deleteKhoa($maKhoa);
       return redirect("admin/khoa/danhSach");
    }
    /*public function listDS($maKhoa)
    {
        $listDS=KhoaHocModel::listDS($maKhoa);
        return view('admin/khoa/danhsachlop',['listDS'=>$listDS]);
    }*/
}
