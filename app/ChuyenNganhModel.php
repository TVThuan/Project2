<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ChuyenNganhModel extends Model
{
    protected $table = "tblChuyenNganh"; 
    
    static function getDanhSach()
    {
    	$chuyenNganh=DB::select('select * from tblChuyenNganh');
    	return $chuyenNganh;
    }

    
    static function getById($maCN)
    {
    	$chuyenNganh=DB::select("select *from tblChuyenNganh where maCN=?",[$maCN]);
    	return $chuyenNganh[0];
    }

    static function insert($tenCN)
    {
    	DB::insert("insert into tblChuyenNganh(tenCN) values(?)",[$tenCN]);

    }

    static function updateChuyenNganh($maCN,$tenCN)
    {
    	DB::update("update tblChuyenNganh set tenCN=? where maCN=?",[$maCN,$tenCN]);	
    }

    static function deleteChuyenNganh($maCN)
    {
    	DB::delete("delete from tblChuyenNganh where maCN=?",[$maCN]);
    }
}	
