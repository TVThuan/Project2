<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenNganhModel;
use App\SinhVienModel;
use App\MonModel;
use App\lopModel;
use App\UserModel;
use App\DiemModel;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    //
    function getdangnhap()
    {
    	return view('pages.dangnhap');
    }
    function postdangnhap(Request $request)
    {
    	        
        $objUser=new UserModel();
        $objUser->email=$request->email;
        $objUser->password=md5($request->password);
        $check=UserModel::getdangnhapAdmin($objUser);
        
        if($check>0)
        {
            $hoTen=UserModel::getEmail($request->email);
            session()->put('users',$hoTen->hoTen);
            session()->put('masv',$hoTen->maSv);
            return redirect('sinhVien/trangchu/diem/'.session('masv'));
        }else
        {
            return redirect('sinhVien/dangnhap')->with('thongbao','Đăng Nhập Không Thành Công');
        }
    }
    function getdangxuat(Request $request)
    {
    	$request->session()->flush();
        return  redirect('sinhVien/dangnhap');
    }
    function getdoimatkhau()
    {
       
        return view('pages.doimatkhau');
    }   
     function postthongtincanhan(Request $request)
    {
       
        $objSinhVien=new SinhVienModel();
        $objSinhVien->hoTen = $request->ten;
        $objSinhVien->ngaySinh=$request->ngaysinh;
        $objSinhVien->diaChi=$request->diachi;
        
        SinhVienModel::postthongtincanhan($objSinhVien);
        return redirect('sinhVien/trangchu/thongtincanhan/'.session('masv'))->with('thongbao','Cập Nhật Thành Công');

    }
    function diem($maSv)
    {
        $dsd=DiemModel::getById($maSv);
        return view("pages.diem",['dsd'=>$dsd]);
    }   
    function getthongtincanhan($maSv)
    {
        $ds=SinhVienModel::getByIddiem($maSv);
        return view('pages.thongtincanhan',["ds"=>$ds]);
    }  
}
