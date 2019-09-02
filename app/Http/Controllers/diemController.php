<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\DiemModel;
use App\SinhVienModel;
use App\MonModel;
use App\KhoaHocModel;
use App\lopModel;
use DB;
class diemController extends Controller
{
    //lấy ra danh sách điểm
     public function getDanhSachDiem()
    {
        $mon= MonModel::all();
        $ds= SinhVienModel::all();
        $dsdiem=DiemModel::all();
        return view('admin.diem.danhSachDiem',["mon" => $mon,"ds" => $ds,"dsdiem"=>$dsdiem]);
    }

    public function getAll()
    {
        $khoa= KhoaHocModel::all();
        $mon= MonModel::all();
        return view('admin.diem.them',['khoa'=>$khoa],["mon" => $mon]);
    }
    public function diem($maSv)
    {
        $ds=SinhVienModel::getByIddiem($maSv);
        $mon= MonModel::all();  
        return view('admin.diem.themdiem',["mon" => $mon, 'ds'=>$ds]);
    }
    public function thongke()
    {
        $khoa= KhoaHocModel::all();
        $mon= MonModel::all();  
        return view('admin.diem.thongke',["mon" => $mon],['khoa'=>$khoa]);
    }
    public function in($maSv)
    {
        $ds=DiemModel::in($maSv);
        $dsdiem=DiemModel::getById($maSv);
        return view('admin.diem.inPhieuDiem',['ds'=>$ds],['dsdiem'=>$dsdiem]);
    }

     public function getByIddiemsv($maSv,$maMon)
    {
        $ds=DiemModel::laydiem($maSv,$maMon);
        return view("admin.diem.sua",["ds"=>$ds]);
    }


   
    public function insertdiem(Request $request)
    {   
        $objdiem= new DiemModel;
        $objdiem->maSv=$request->maSv;
        $objdiem->maMon=$request->maMon;
        $count=DiemModel::check($request->maSv,$request->maMon);
        if(count($count) != 0)
        {
             return redirect('admin/diem/themdiem/'.$request->maSv)->with('thongbao','Môn này đã có điểm');
        }
        else
        {
            $objdiem->diemThiFinalLan1=$request->txtDiem;
            $objdiem->diemThiSkillLan1=$request->txtDiem3;
             
             if($objdiem->diemThiFinalLan1>5)
            {
                
            }else
            {
                $objdiem->diemThiFinalLan2=$request->txtDiem2;
            }

            if ($objdiem->diemThiSkillLan1 >5)
            {
                
            }else
            {
               $objdiem->diemThiSkillLan2=$request->txtDiem4;
            }

            $objdiem->save();
            return redirect('admin/diem/themdiem/'.$request->maSv)->with('thongbao','Thêm Thành Công');
        }
    }
     public function insertdiemc1(Request $request)
    {   
        $objdiem= new DiemModel;
        $objdiem->maSv=$request->sinhvien;
        $objdiem->maMon=$request->maMon;
        $objdiem->diemThiFinalLan1=$request->txtDiem;
        $objdiem->diemThiSkillLan1=$request->txtDiem3;
        if($request->changePasswordd=="on")
        {
            $objdiem->diemThiFinalLan2=$request->txtDiem2;
            $objdiem->diemThiSkillLan2=$request->txtDiem4;
        }
        $objdiem->save();
        return redirect('admin/diem/them')->with('thongbao','Thêm Điểm Thành Công');
    }
   
    // sửa điểm
    public function updateDiem(Request $request,$maSv,$maMon)
    {
        
        $diem=new DiemModel;
        $diem->maSv=$maSv;
        $diem->maMon=$maMon;
        $diem->diemThiFinalLan1=$request->diem1;
        $diem->diemThiSkillLan1=$request->diem3;
        if($diem->diemThiFinalLan1>5)
        {
            $diem->diemThiFinalLan2=0;
        }else
        {
            $diem->diemThiFinalLan2=$request->diem2;
        }

        if ($diem->diemThiSkillLan1 >5)
        {
            $diem->diemThiSkillLan2=0;
        }else
        {
           $diem->diemThiSkillLan2=$request->diem4;
        }

        DiemModel::updateDiem($diem);
        
        return redirect('admin/sinhVien/diem/'.$maSv)->with('thongbao','Sửa Điểm Thành Công');
    }
    //xóa điểm
    public function deletediem($maSv,$maMon)
    {
    DiemModel::deletediem($maSv,$maMon);
    return redirect("admin/sinhVien/diem/".$maSv);
    }
}
