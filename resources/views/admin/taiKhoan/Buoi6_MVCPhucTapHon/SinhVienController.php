<?php
namespace kieutho\Http\Controllers;
use Illuminate\Http\Request;
use kieutho\Http\Requests;
use kieutho\Http\Controllers\Controller;
use kieutho\SinhVienModel;
use kieutho\LopModel;
class SinhVienController extends Controller {	
	
   public function getAll(){        
		$ds = SinhVienModel::getAll();
		return view("sinhVienList",["ds"=>$ds]);
   }   
   public function getAllLop()
   {
	   $dslop = LopModel::getAll();
		return view("sinhVienInsert",["dslop"=>$dslop]);
   }
   public function getById($ma)
   {
	 $sv = SinhVienModel::getById($ma);
	 $dslop = LopModel::getAll();
	 return view("sinhVienUpdate",["sv"=>$sv,"dslop"=>$dslop]);
   }
    public function insert(Request $request)
   {
	   $ten = $request->txtTen;
	   $gt = $request->rdoGT;
	   $malop = $request->cboLop;
	   SinhVienModel::insert($ten,$gt,$malop);
	   return redirect("list");
   }
    public function update(Request $request)
   {
	   $ma = $request->txtMa;
	   $ten = $request->txtTen;
	   $gt = $request->rdoGT;
	   $malop = $request->cboLop;
	   SinhVienModel::updateSinhVien($ten,$gt,$malop,$ma);
	   return redirect("list");
   }
   public function deleteById($ma)
   {
	 SinhVienModel::deleteById($ma);
	 return redirect("list");
   }
   
}