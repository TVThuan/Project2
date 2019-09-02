<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class SinhVienModel extends Model
{
    protected $table = "tblSinhVien"; 
    protected $primaryKey = 'maSv';
    public $timestamps = false;
    static function getDanhSach()
    {
        $sv=DB::select('select tblsinhvien.maSv,tblsinhvien.email,tblsinhvien.PQ,tblsinhvien.hoTen,tblsinhvien.ngaySinh,tblsinhvien.gioiTinh,tblsinhvien.diaChi,tblsinhvien.soDienThoai,tbllop.tenLop  from tblsinhvien inner join tbllop on tblsinhvien.maLop=tbllop.maLop');
        return $sv;
    }

    static function getById($maSv)
    {
        $sv=DB::select("select *from tblsinhvien where maSv=?",[$maSv]);
        return $sv[0];

    }
    static function getByIddiem($maSv)
    {
        
        $sv=DB::select("select tblsinhvien.maSv,tblsinhvien.email,tblsinhvien.PQ,tblsinhvien.hoTen,tblsinhvien.ngaySinh,tblsinhvien.gioiTinh,tblsinhvien.diaChi,tblsinhvien.soDienThoai,tbllop.tenLop from tblsinhvien inner join tbllop on tblsinhvien.maLop=tbllop.maLop where maSv=?",[$maSv]);
        return $sv[0];

    }
    
    
    static function insert($objSv)
    {
        DB::insert("insert into tblSinhVien(email,password,PQ,hoTen,ngaySinh,gioiTinh,diaChi,soDienThoai,maLop) values('$objSv->email',$objSv->password,$objSv->PQ,'$objSv->hoTen','$objSv->ngaySinh',$objSv->gioiTinh,'$objSv->diaChi','$objSv->soDienThoai','$objSv->maLop'");

    }
     static function get_distinct()
    {
        $list_distinct=DB::table('tblsinhvien')->distinct()->select('PQ')->get();
        return $list_distinct;
    }

    static function updateSv($objSv)
    {
        $maSv=$objSv->maSv;
        $hoTen=$objSv->hoTen;
        $ngaySinh=$objSv->ngaySinh;
        $gioiTinh=$objSv->gioiTinh;
        $diaChi=$objSv->diaChi;
        $soDienThoai=$objSv->soDienThoai;
        $maLop=$objSv->maLop;
       
        DB::update("update tblSinhVien set hoTen=?,ngaySinh=?,gioiTinh=?,diaChi=?,soDienThoai=?,maLop=? where maSv=?",[$hoTen,$ngaySinh,$gioiTinh,$diaChi,$soDienThoai,$maLop,$maSv]);    
    }
    static function postthongtincanhan($objSinhVien)
    {
        $maSv=$objSinhVien->maSv;
        $hoTen=$objSinhVien->hoTen;
        $ngaySinh=$objSinhVien->ngaySinh;
        $diaChi=$objSinhVien->diaChi;
         DB::update("update tblSinhVien set hoTen=?,ngaySinh=?,diaChi=? where maSv=?",[$hoTen,$ngaySinh,$diaChi,$maSv]);    
    }
    
    static function deleteSv($maSv)
    {
        DB::delete("delete from tblSinhVien where maSv=?",[$maSv]);
    }
}    