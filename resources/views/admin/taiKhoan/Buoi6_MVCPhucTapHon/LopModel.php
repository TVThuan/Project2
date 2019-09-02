<?php namespace kieutho;
use Illuminate\Database\Eloquent\Model;
use DB;
class LopModel extends Model{
		
   public static function getAll(){        
		$ds = DB::select("select * from tbllop");
		return $ds;
   }   
   public static function getById($ma)
   {
	 $ds = DB::select("select * from tbllop where ma=?",[$ma]);
	 return $ds[0];
   }
    public static function insert($ten)
   {	  
	   DB::insert("insert into tbllop(ten) values(?)",[$ten]);	  
   }
    public static function updateLop($ten,$ma)
   {	   
	   DB::update("update tbllop set ten=? where ma=?",[$ten,$ma]);	  
   }
   public static function deleteById($ma)
   {
	 DB::delete("delete from tbllop where ma=?",[$ma]);	
   }
}