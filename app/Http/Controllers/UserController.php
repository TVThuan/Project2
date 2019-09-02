<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lopModel;
use App\ChuyenNganhModel;
use App\KhoaHocModel;
use App\UserModel;
use Illuminate\Support\Facades\Auth;
use DB;
class UserController extends Controller
{

    public function getDanhSach()
    {
    	$ds= UserModel::getDanhSach();
    	return view('admin.taiKhoan.danhsach',['ds'=>$ds]);
    }

    public function getById($maSv)
    {   
        $ds=UserModel::getById($maSv);
        return view("admin.taiKhoan.sua",["ds"=>$ds]);
    }

    public function UpdateTK(Request $request,$maSv)
    {

        $objUser= UserModel::find($maSv);
        $objUser->hoTen=$request->hoTen;
        $objUser->PQ=$request->PQ;
        if($request->changePassword=="on")
        {
            $objUser->password=md5($request->password);
        }
        $objUser->save();
        return redirect('admin/taiKhoan/sua/'.$maSv)->with('thongbao','Cập Nhật Thành Công');
    }

     public function getdangnhapAdmin()
    {
        
        return view("admin.login");
    }

    public function postdangnhapAdmin(Request $request)
    {
        
        $objUser=new UserModel();
        $objUser->email=$request->email;
        $objUser->password=md5($request->password);
        $check=UserModel::getdangnhapAdmin($objUser);
        
        if($check>0)
        {
            $hoTen=UserModel::getEmail($request->email);
            session()->put('users',$hoTen->hoTen);
            return redirect('admin/dashboard/danhSach');
        }else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng Nhập Không Thành Công');
        }
    }  
 
    public function getDangXuatAdmin(Request $request)
        {
        $request->session()->flush();
        return  redirect('admin/dangnhap');
        }
}