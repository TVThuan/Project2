<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class LopModel extends Model
{
    protected $table = 'tbllop'; 

    
    static function getDanhSach()
    {
        $lop=DB::select('select tbllop.maLop,tbllop.tenLop,tblchuyennganh.tenCN,tblkhoahoc.tenKhoa from tbllop inner join tblchuyennganh on tbllop.maCN=tblchuyennganh.maCN INNER JOIN tblkhoahoc on tbllop.maKhoa=tblkhoahoc.maKhoa');
        return $lop;
    }
     static function in($maLop)
    {
        $lop=DB::select('select tbllop.maLop,tbllop.tenLop,tblchuyennganh.tenCN,tblkhoahoc.tenKhoa from tbllop inner join tblchuyennganh on tbllop.maCN=tblchuyennganh.maCN INNER JOIN tblkhoahoc on tbllop.maKhoa=tblkhoahoc.maKhoa where maLop=?',[$maLop]);
        return $lop;
    }


    static function getById($maLop)
    {
        $dsLop=DB::select("select *from tblLop where maLop=?",[$maLop]);
        return $dsLop;
    }

    
    static function insert($objLop)
    {
        DB::insert("insert into tblLop(tenLop,maCN,maKhoa) values('$objLop->tenLop',$objLop->maCN,$objLop->maKhoa)");
    }


    static function updateLop($objLop)
    {
        DB::update("update tbllop set tenLop=?,maCN=? where maLop=?",[$objLop->tenLop,$objLop->maCN,$objLop->maLop]);    
    }


    static function deleteLop($maLop)
    {
        DB::delete("delete from tblLop where maLop=?",[$maLop]);
    }
    
}   
