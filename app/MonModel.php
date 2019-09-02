<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class MonModel extends Model
{
    protected $table = "tblMon"; 

    static function getDanhSach()
    {
        $mon=DB::select('select tblchuyennganh.tenCN,tblmon.tenMon,tblmon.Final,tblmon.Skill,tblmon.maCN,tblmon.maMon from tblchuyennganh inner join tblmon on tblchuyennganh.maCN=tblmon.maCN');
        return $mon;
    }

  
    static function getById($maMon)
    {
        $mon=DB::select("select *from tblMon where maMon=?",[$maMon]);
        return $mon;
    }
   
    static function insert($objMon)
    {
        DB::insert("insert into tblMon(tenMon,maCN,Final,Skill) values('$objMon->tenMon',$objMon->maCN,$objMon->Final,$objMon->Skill)");

    }

  
    static function updateMon($objMon)
    {
        $maMon=$objMon->maMon;
        $tenMon=$objMon->tenMon;
        $maCN=$objMon->maCN;
        $Final=$objMon->Final;
        $Skill=$objMon->Skill;
       
        DB::update("update tblMon set tenMon=?,maCN=?,Final=?,Skill=? where maMon=?",[$tenMon,$maCN,$Final,$Skill,$maMon]); 
    }

    static function deleteMon($maMon)
    {
        DB::delete("delete from tblMon where maMon=?",[$maMon]);
    }
    
}   
