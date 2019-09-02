<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lopModel;
use App\ChuyenNganhModel;
use App\KhoaHocModel;
use DB;
class lopController extends Controller
{
    // lấy ra danh sách lớp
    public function getDanhSach()
    {
    	$ds= lopModel::getDanhSach();
        $dsk= KhoaHocModel::getDanhSach();
    	return view('admin.lop.danhsach',['ds'=>$ds,"dsk"=>$dsk]);
    }
    // lấy ra mã lớp
    public function getById($maLop)
    {
        $dsl=lopModel::getById($maLop);
        $cn=ChuyenNganhModel::all();
        $khoa=KhoaHocModel::all();
        $objLop=new lopModel();
        $objLop=$dsl[0];
        return view("admin.lop.sua",["objLop"=>$objLop,"cn"=>$cn,"khoa"=>$khoa]);
    }
    //lấy ra danh sách chuyên ngành và danh sách khóa học (sai chưa sửa được)
    public function getDanhSachCN()
    {
        $dsk=KhoaHocModel::getDanhSach();
        $dscn=ChuyenNganhModel::getDanhSach();
        return view('admin.lop.them',['dscn'=>$dscn,"dsk"=>$dsk]);
    }
    // thêm lớp
    public function insert(Request $request)
    {
      $this->validate($request,
        [
           
            'txtTen'=>'required|min:3|max:100|unique:tblLop,tenLop',
            'cboCn'=>'required',
            'cboKhoa'=>'required',
        ],
        [

            'txtTen.required'=>'Bạn chưa nhập tên lớp',
            'txtTen.min'=>'Tên lớp phải có độ dài từ 3 đến 100 ký tự',
            'txtTen.max'=>'Tên lớp phải có độ dài từ 3 đến 100 ký tự',
            'txtTen.unique'=>'Lớp đã tồn tại',
            'cboCn.required'=>'Bạn chưa chọn chuyên ngành',
            'cboKhoa.required'=>'Bạn chưa chọn khóa',
        ]);

        $objLop=new lopModel();
        $objLop->tenLop=$request->txtTen;
        $objLop->maCN=$request->cboCn;
        $objLop->maKhoa=$request->cboKhoa;
        lopModel::insert($objLop);
        return redirect('admin/lop/them')->with('thongbao','Thêm Lớp Thành Công');
    }

    
    // sửa lớp
    public function updateLop(Request $request,$id)
    {
        $objLop=new lopModel();
        $objLop->maLop = $id;
        $objLop->tenLop=$request->txtTen;
        $objLop->maCN=$request->txtChuyenNganh;
        
        lopModel::updateLop($objLop);
        return redirect("admin/lop/sua/".$id)->with('thongbao','Cập Nhật Thành Công');
    }

    // xóa lớp
    public function deleteLop($maLop)
    {
        lopModel::deleteLop($maLop);
       return redirect("admin/lop/danhSach");
    }
   
}
