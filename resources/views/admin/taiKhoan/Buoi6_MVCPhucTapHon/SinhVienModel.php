<?php namespace kieutho;
use Illuminate\Database\Eloquent\Model;
use DB;
class SinhVienModel extends Model{
		
   public static function getAll(){        
		$ds = DB::select("select * from tblsv");
		return $ds;
   }   
   public static function getById($ma)
   {
	 $ds = DB::select("select * from tblsv where ma=?",[$ma]);
	 return $ds[0];
   }
    public static function insert($ten,$gt,$malop)
   {	  
	   DB::insert("insert into tblsv(ten,gt,malop) values(?,?,?)",[$ten,$gt,$malop]);	  
   }
    public static function updateSinhVien($ten,$gt,$malop,$ma)
   {	   
	   DB::update("update tblsv set ten=?,gt=?,malop=? where ma=?",[$ten,$gt,$malop,$ma]);	  
   }
   public static function deleteById($ma)
   {
	 DB::delete("delete from tblsv where ma=?",[$ma]);	
   }
}