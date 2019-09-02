<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class DiemModel extends Model
{
    protected $table = "tblDiem"; 
    protected $primaryKey = 'maSv';
    public $timestamps = false;
    //thừa
    /*static function getDanhSach()
    {
        $diem=DB::select('select tbldiem.maSv,tblsinhvien.hoTen,tblmon.tenMon,tbldiem.diemThiFinalLan1,tbldiem.diemThiFinalLan2,tbldiem.diemThiSkillLan1,tbldiem.diemThiSkillLan2 FROM tbldiem INNER JOIN tblsinhvien ON tbldiem.maSv=tblsinhvien.maSv INNER JOIN tblmon ON tbldiem.maMon=tblmon.maMon');
        return $diem;
    }*/

    /*static function getAll()
    {
        $mon=DB::select('select *from tblmon');
        return $mon;
    }*/

    static function getById($maSv)
    {
        $diem=DB::select("select tbldiem.maSv,tblsinhvien.hoTen,tblmon.tenMon,tblmon.maMon,tbldiem.diemThiFinalLan1,tbldiem.diemThiFinalLan2,tbldiem.diemThiSkillLan1,tbldiem.diemThiSkillLan2 FROM tbldiem INNER JOIN tblsinhvien ON tbldiem.maSv=tblsinhvien.maSv INNER JOIN tblmon ON tbldiem.maMon=tblmon.maMon where tbldiem.maSv=?",[$maSv]);
        return $diem;
    }
    static function getByIddiemsv($maSv)
    {
        $diem=DB::select("select tbldiem.maSv,tblsinhvien.hoTen,tblmon.tenMon,tblmon.maMon,tbldiem.diemThiFinalLan1,tbldiem.diemThiFinalLan2,tbldiem.diemThiSkillLan1,tbldiem.diemThiSkillLan2 FROM tbldiem INNER JOIN tblsinhvien ON tbldiem.maSv=tblsinhvien.maSv INNER JOIN tblmon ON tbldiem.maMon=tblmon.maMon where tbldiem.maSv=? ",[$maSv]);
        return $diem[0];
    }
    static function laydiem($maSv,$maMon)
    {
         $diem=DB::select("select tbldiem.maSv,tblsinhvien.hoTen,tblmon.tenMon,tblmon.maMon,tbldiem.diemThiFinalLan1,tbldiem.diemThiFinalLan2,tbldiem.diemThiSkillLan1,tbldiem.diemThiSkillLan2 FROM tbldiem INNER JOIN tblsinhvien ON tbldiem.maSv=tblsinhvien.maSv INNER JOIN tblmon ON tbldiem.maMon=tblmon.maMon where tbldiem.maSv=? and tblmon.maMon=?",[$maSv,$maMon]);
        return $diem[0];
    }
   
    static function check($maSv,$maMon)
    {
        $check=DB::select("SELECT * FROM `tbldiem` WHERE maSv=? and maMon=?",[$maSv,$maMon]);
        return $check;
    }
    static function in($maSv)
    {
        
        $sv=DB::select("select tblsinhvien.maSv,tblsinhvien.hoTen,tbllop.tenLop,tblchuyennganh.tenCN,tblkhoahoc.tenKhoa from tblsinhvien inner join tbllop on tblsinhvien.maLop=tbllop.maLop INNER JOIN tblchuyennganh on tbllop.maCN=tblchuyennganh.maCN INNER JOIN tblkhoahoc on tbllop.maKhoa=tblkhoahoc.maKhoa WHERE maSv=?
",[$maSv]);
        return $sv;

    }
    static function insertdiem($objDiem)
    {

        DB::insert('insert into tblDiem(maMon,diemThiFinalLan1,diemThiFinalLan2,diemThiSkillLan1,diemThiSkillLan2)values($objDiem->maMon,$objDiem->diemThiFinalLan1,$objDiem->diemThiFinalLan2,$objDiem->diemThiSkillLan1,$objDiem->diemThiSkillLan2 where maSv=?)');
    }

   
    static function updateDiem($obj)
    {
        DB::update("update tblDiem set diemThiFinalLan1=?,diemThiFinalLan2=?,diemThiSkillLan1=?,diemThiSkillLan2=? where maSv=? and maMon=?",[$obj->diemThiFinalLan1,$obj->diemThiFinalLan2,$obj->diemThiSkillLan1,$obj->diemThiSkillLan2,$obj->maSv,$obj->maMon]);    
    }

    static function deletediem($maSv,$maMon)
    {
        DB::delete("delete from tblDiem where maSv=? and maMon=?",[$maSv,$maMon]);
    }
    static function thongketheolop($maLop)
    {
       $tktl= DB::select("SELECT A.*,tbllop.tenLop FROM 
                (SELECT tbldiem.diemThiFinalLan1,tbldiem.diemThiFinalLan2,tbldiem.diemThiSkillLan1
            ,tbldiem.diemThiSkillLan2 , tblsinhvien.maLop ,tblsinhvien.hoTen , tblmon.tenMon,tblsinhvien.maSv FROM tbldiem 
            INNER JOIN tblsinhvien ON tbldiem.maSv=tblsinhvien.maSv
            INNER JOIN tblmon on tbldiem.maMon=tblmon.maMon)A
            INNER JOIN tbllop ON tbllop.maLop=A.maLop
            WHERE tbllop.maLop =?",[$maLop]);
        return  $tktl;
    }

}