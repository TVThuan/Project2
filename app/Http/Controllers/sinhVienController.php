<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVienModel;
use App\LopModel;
use App\DiemModel;
use App\KhoaHocModel;
use App\ChuyenNganhModel;
use DB;
class sinhVienController extends Controller
{
    // Lấy Ra Danh Sách Sinh Viên
    public function getDanhSach()
    {
    	$dssv= SinhVienModel::getDanhSach();
        $khoa=KhoaHocModel::all();
    	return view('admin.sinhVien.danhsach',['dssv'=>$dssv,"khoa"=>$khoa]);
    }
    //Lấy ra danh sách lớp và phân quyền
    public function getDanhSachLop()
    {
        $dsLop=LopModel::getDanhSach();
        $listKhoa=KhoaHocModel::getDanhSach();
        return view('admin.sinhVien.them',['dsLop'=>$dsLop,"listKhoa"=>$listKhoa]);
    }
    // lấy ra mã sinh viên 
   public function getById($maSv)
    {   
        $lop=LopModel::getDanhSach();
        $ds=SinhVienModel::getById($maSv);
        return view("admin.sinhVien.sua",["ds"=>$ds,"lop"=>$lop]);
    }
    //lấy ra mã sinh viên điểm
     public function getByIddiem($maSv)
    {   
        $dsd=DiemModel::getById($maSv);
        $ds=SinhVienModel::getByIddiem($maSv);
        return view("admin.diem.danhsach",["ds"=>$ds,'dsd'=>$dsd]);
    }
    // thêm sinh viên
    public function insert(Request $request)
    {
         $this->validate($request,
        [
           
            'txtEmail'=>'required|email|unique:tblSinhVien,email',
            'txtPass'=>'required|min:3|max:30',
            'txtTen'=>'required|min:3|max:30',
            'txtNs'=>'required',
            'rdoGT'=>'required',
            'txtDc'=>'required|min:3|max:30',
            'txtsdt'=>'required|min:3|max:30',
            'cboLop'=>'required',
            
        ],
        [

            'txtEmail.required'=>'Bạn chưa nhập email',
            'txtEmail.email'=>'Email chưa đúng định dạng',
            'txtEmail.unique'=>'Email Đã Tồn Tại',
            'txtPass.required'=>'Bạn chưa nhập mật khẩu',
            'txtPass.min'=>'Mật khẩu phải có đội dài từ 3 đến 30 ký tự',
            'txtPass.max'=>'Mật khẩu phải có đội dài từ 3 đến 30 ký tự',
            'txtTen.required'=>'Bạn chưa nhập tên sinh viên',
            'txtTen.min'=>'Tên phải có đội dài từ 3 đến 30 ký tự',
            'txtTen.max'=>'Mật khẩu phải có đội dài từ 3 đến 30 ký tự',
            'txtNs.required'=>'Bạn chưa nhập ngày sinh',
            'rdoGT.required'=>'Bạn chưa chọn giới tính',
            'txtDc.required'=>'Bạn chưa nhập địa chỉ',
            'txtsdt.required'=>'Bạn chưa nhập số điện thoại',
            'cboLop.required'=>'Bạn chưa chọn lớp',
            
        ]);
    
        $objSv=new SinhVienModel;
        
        $objSv->email=$request->txtEmail;
        $objSv->password=md5($request->txtPass);
        $objSv->PQ=$request->txtLevel;
        $objSv->hoTen=$request->txtTen;
        $objSv->ngaySinh=$request->txtNs;
        $objSv->gioiTinh=$request->rdoGT;
        $objSv->diaChi=$request->txtDc;
        $objSv->soDienThoai=$request->txtsdt;
        $objSv->maLop=$request->cboLop;
        $objSv->save();
        return redirect('admin/sinhVien/them')->with('thongbao','Thêm Thành Công');
    }

    // sửa sinh viên
    public function updateSv(Request $request,$id)
    {
        $objSv=new SinhVienModel();
        $objSv->maSv=$id;
        $objSv->hoTen=$request->Ten;
        $objSv->ngaySinh=$request->Ns;
        $objSv->gioiTinh=$request->rdbGt;
        $objSv->diaChi=$request->Dc;
        $objSv->soDienThoai=$request->Sdt;
        $objSv->maLop=$request->Lop;
        SinhVienModel::updateSv($objSv);
        return redirect('admin/sinhVien/sua/'.$id)->with('thongbao','Cập Nhật Thành Công');
    }
   
    // xóa sinh viên
    public function deleteSv($maSv)
    {
        SinhVienModel::deleteSv($maSv);
       return redirect("admin/sinhVien/danhSach")->with('thongbao','Xóa Thành Công');;
    }   

    public function updatetk(Request $request,$id)
    {
        $objSv=new SinhVienModel();
        $objSv->maSv=$id;
        $objSv->hoTen=$request->Ten;
        $objSv->ngaySinh=$request->Ns;
        $objSv->gioiTinh=$request->rdbGt;
        $objSv->diaChi=$request->Dc;
        $objSv->soDienThoai=$request->Sdt;
        $objSv->maLop=$request->Lop;
        SinhVienModel::updateSv($objSv);
        return redirect('admin/sinhVien/sua/'.$id)->with('thongbao','Cập Nhật Thành Công');
    }
}