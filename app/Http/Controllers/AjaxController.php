<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LopModel;
use App\ChuyenNganhModel;
use App\KhoaHocModel;
use App\SinhVienModel;
use App\DiemModel;
use App\MonModel;
use DB;
class AjaxController extends Controller
{
  // public function getLop($maKhoa)
  //  {
  //       $lop=lopModel::where('maKhoa',$maKhoa)->get();
  //       foreach ($lop as $lop)
  //       {
  //           echo "<option value='".$lop->maLop."'>".$lop->tenLop."</option>";
  //       }
  //  }
   /*
   public function getdanhsach($maLop)
   {
        $lop=lopModel::where('maLop',$maLop)->get();
        foreach ($lop as $lop)
        {
            echo "<option value='".$lop->maLop."'>".$lop->tenLop."</option>";
        }
   }
   */
   public function getLop(Request $request)
   {
      $data = LopModel::where('maKhoa',$request->id)->get();
      return response()->json($data);
   }
   public function getSv(Request $request)
   {
      $data = SinhVienModel::where('maLop',$request->id)->get();
      $mon= MonModel::all();
    
      return response()->json(['tenSinhVien'=>$data,'tenMon'=>$mon]);
   }
  
      public function get_diem_sv(Request $request)
   {
      $array_sv = SinhVienModel::where('maLop',$request->id)->get()->toArray();
      $array_ma_sv = array_column($array_sv, 'maSv');
      $array_diem = DiemModel::whereIn('maSV',$array_ma_sv)->get();
      $array = array();
      foreach ($array_diem as $each) {
        $array[$each->maSv][$each->maMon]["diemThiFinalLan1"] = $each->diemThiFinalLan1;
        $array[$each->maSv][$each->maMon]["diemThiFinalLan2"] = $each->diemThiFinalLan2;
        $array[$each->maSv][$each->maMon]["diemThiSkillLan1"] = $each->diemThiSkillLan1;
        $array[$each->maSv][$each->maMon]["diemThiSkillLan2"] = $each->diemThiSkillLan2;
      }
      $array_mon = MonModel::get();
      $table = "<table class='table table-hover'><thead><tr><th>Họ Tên</th>";
      foreach ($array_mon as $each) {
        $table .= "<th>$each->tenMon</th>";
      }
      $table .= "</tr></thead><tbody>";
      foreach ($array_sv as $sv) {
        $table .= "<tr><td>".$sv["hoTen"]."</td>";
        foreach ($array_mon as $mon) {
          if(!empty($array[$sv["maSv"]][$mon->maMon])){
            $table .= "<td>".$array[$sv["maSv"]][$mon->maMon]["diemThiFinalLan1"]."</td>";
             $table .= "<td>".$array[$sv["maSv"]][$mon->maMon]["diemThiFinalLan2"]."</td>";
              $table .= "<td>".$array[$sv["maSv"]][$mon->maMon]["diemThiSkillLan1"]."</td>";
               $table .= "<td>".$array[$sv["maSv"]][$mon->maMon]["diemThiSkillLan2"]."</td>";
            
          }
          else{
            $table .= "<td></td><td></td><td></td><td></td>";
          }
        }
        $table .= "</tr>";
      }
      $table .= "</tbody></table>";
      return $table;
   }
}
