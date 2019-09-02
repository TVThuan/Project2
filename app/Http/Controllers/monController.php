<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonModel;
use App\ChuyenNganhModel;
use DB;
class monController extends Controller
{
    //lấy ra danh sách môn học
    public function getDanhSach()
    {
    	$ds= MonModel::getDanhSach();
    	return view('admin.mon.danhsach',['ds'=>$ds]);
    }
    // lấy ra danh sách chuyên ngành
    public function getDanhSachCN()
    {
        $dscn=ChuyenNganhModel::getDanhSach();
        return view('admin.mon.them',['dscn'=>$dscn]);
    }

    // thêm môn
    public function insert(Request $request)
    {
       

      $this->validate($request,
        [
           
            'txtTen'=>'required|min:3|max:100|unique:tblchuyennganh,tenCN',
            'cboCn'=>'required',
            'rdbthiFinal'=>'required',
            'rdbthiSkill'=>'required',
        ],
        [
            'txtTen.required'=>'Bạn Chưa Nhập Tên Môn',
            'cboCn.required'=>'Bạn Chưa Chọn Chuyên Ngành',
            'rdbthiFinal.required'=>'Bạn Chưa Chọn Final',
            'rdbthiSkill.required'=>'Bạn Chưa Chọn Skill',
            'txtTen.min'=>'Tên Môn Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.max'=>'Tên Môn Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.unique'=>'Môn Đã Tồn Tại',
        ]);
          /*$this->validate($request,
        [
           
            'txtTen'=>'required|min:3|max:100|unique:tblMon,tenMon',
        ],
        [

            'txtTen.required'=>'Bạn chưa nhập tên môn',
            'txtTen.min'=>'Tên Môn Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.max'=>'Tên Môn Phải Có Độ Dài Từ 3 đến 100 ký tự',
            'txtTen.unique'=>'Môn Đã Tồn Tại',
        ]);*/
        $objMon=new MonModel();
        $objMon->tenMon=$request->txtTen;
        $objMon->maCN=$request->cboCn;
        $objMon->Final=$request->rdbthiFinal;
        $objMon->Skill=$request->rdbthiSkill;
        
        MonModel::insert($objMon);
        return redirect('admin/mon/them')->with('thongbao','Thêm Môn Thành Công');
    }

    // lấy ra mã môn để sửa
    public function getById($maMon)
    {
        $cn=ChuyenNganhModel::all();
        $ds=MonModel::getById($maMon);
        $objMon=new MonModel();
        $objMon=$ds[0];
        return view("admin.mon.sua",["objMon"=>$objMon,'cn'=>$cn]);
    }

    // sửa môn
    public function updateMon(Request $request,$id)
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
        $objMon=new MonModel();
        $objMon->maMon = $id;
        $objMon->tenMon = $request->txtTen;
        $objMon->maCN = $request->txtChuyenNganh;
        $objMon->Final = $request->rdbthiFinal;
        $objMon->Skill = $request->rdbthiSkill;
        MonModel::updateMon($objMon);
        return redirect("admin/mon/danhSach")->with('thongbao','Cập Nhật Thành Công');
    }

    // xóa môn
    public function deleteMon($maMon)
    {
        MonModel::deleteMon($maMon);
       return redirect("admin/mon/danhSach");
    }
}
