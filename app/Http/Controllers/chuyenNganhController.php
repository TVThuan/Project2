<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenNganhModel;
use DB;
class chuyenNganhController extends Controller
{
    // lấy ra danh sách chuyên ngành
    public function getDanhSach()
    {
    	$ds= ChuyenNganhModel::all();
    	return view('admin/chuyenNganh/danhsach',['ds'=>$ds]);
    }

    //lấy ra mã chuyên ngành
    public function getById($maCN)
    {
        $ds=ChuyenNganhModel::getById($maCN);
        return view("admin/chuyenNganh/sua",["ds"=>$ds]);
    }

    // thêm chuyên ngành
    public function insert(Request $request)
    {
      $this->validate($request,
        [
           
            'txtTen'=>'required|min:3|max:100|unique:tblchuyennganh,tenCN',
        ],
        [

            'txtTen.required'=>'Bạn chưa nhập tên chuyên ngành',
            'txtTen.min'=>'Tên Chuyên Ngành Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.max'=>'Tên Chuyên Ngành Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.unique'=>'Chuyên Ngành Đã Tồn Tại',
        ]);
    
      
        $tenCN=$request->txtTen;
        ChuyenNganhModel::insert($tenCN);
        return redirect('admin/chuyenNganh/them')->with('thongbao','Thêm Thành Công');
    
        
}
    // sửa chuyên ngành
    public function updateChuyenNganh(Request $request)
    {
        
        
      $this->validate($request,
        [
           
            'txtTen'=>'required|min:3|max:100'
        ],
        [
            'txtTen.required'=>'Bạn Chưa Nhập Tên Chuyên Ngành',
            'txtTen.min'=>'Tên Chuyên Ngành Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.max'=>'Tên Chuyên Ngành Phải Có Độ Dài Từ 3 đến 100 ký tự',
        ]);
        $maCN = $request->txtMa;
        $tenCN = $request->txtTen;
        ChuyenNganhModel::updateChuyenNganh($tenCN,$maCN);
        return redirect("admin/chuyenNganh/sua/".$maCN)->with('thongbao','Cập Nhật Thành Công');
    }
    // xóa chuyên ngành
    public function deleteChuyenNganh($maCN)
    {
        ChuyenNganhModel::deleteChuyenNganh($maCN);
       return redirect("admin/chuyenNganh/danhSach");
    }
}
