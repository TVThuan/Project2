<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSinhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tblSinhVien',function(Blueprint  $table){
            
            $table->increments('maSv');
            $table->String('email',100);
            $table->String('password',100);
            $table->integer('PQ');
            $table->String('hoTen',100);
            $table->date('ngaySinh');
            $table->boolean('gioiTinh');
            $table->String('diaChi',100);
            $table->String('soDienThoai',15);
            $table->integer('maLop')->unsigned();
            $table->foreign('maLop')->references('maLop')->on('tblLop');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblSinhVien');
    }
}
