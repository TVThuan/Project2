<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserModel extends Model
{
   
    
   
    protected $table = 'tblsinhvien';
    protected $primaryKey = 'maSv';
    public $timestamps = false;
    protected $fillable = ['maSv','hoTen','email', 'password','PQ','ngaySinh','gioiTinh','diaChi','soDienThoai' ];
    /*static function getDanhSach()
    {
        $user = DB::table('tblsinhvien')->orderBy('PQ', 'asc')->get();
        return $user;
    }*/
    
	static function getDanhSach()
	{
		$tk=DB::select('select *from tblSinhVien');
		return $tk;
	}
	static function getById($maSv)
    {
        $sv=DB::select("select *from tblsinhvien where maSv=?",[$maSv]);
        return $sv[0];
    }

    /* static function UpdateTK($objUser)
    {
        $maSv=$objUser->maSv;
        $hoTen=$objUser->hoTen;
        $PQ=$objUser->PQ;
        $password=$objUser->password;
        

        DB::update("update tblSinhVien set hoTen=?,password=?,PQ=? where maSv=?",[$hoTen,$password,$PQ,$maSv]); 
      
    }*/


	static function getdangnhapAdmin($objUser)
    {
        $sql="select *from tblsinhvien where email='$objUser->email' and password='$objUser->password'";
        $arrUser=DB::select($sql);
        $check=count($arrUser);
        return $check;
    }
    static function getEmail($email)
    {
        $sql=DB::select("select hoTen,maSv from tblsinhvien where email=?",[$email]);
        return $sql[0];
    }
}