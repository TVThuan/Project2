<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class KhoaHocModel extends Model
{
    protected $table = "tblKhoaHoc"; 
    
    static function getDanhSach()
    {
        $khoa=DB::select('select * from tblKhoaHoc');
        return $khoa;
    }


    static function getById($maKhoa)
    {
        $khoa=DB::select("select *from tblKhoaHoc where maKhoa=?",[$maKhoa]);
        return $khoa[0];
    }


    static function insert($tenKhoa)
    {
        DB::insert("insert into tblKhoaHoc(tenKhoa) values(?)",[$tenKhoa]);

    }

 
    static function updateKhoa($maKhoa,$tenKhoa)
    {
        DB::update("update tblKhoaHoc set tenKhoa=? where maKhoa=?",[$tenKhoa,$maKhoa]);  
    }

    static function deleteKhoa($maKhoa)
    {
        DB::delete("delete from tblKhoaHoc where maKhoa=?",[$maKhoa]);
    }
   /*static function listDS($maKhoa)
    {
        $listDS=DB::select('select * from tblLop where maKhoa=?');
        return $listDS;
    }*/
}   
