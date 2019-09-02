<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblLop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tblLop',function($table){
            $table->increments('maLop');
            $table->String('tenLop',100)->unique();
            $table->integer('maCN')->unsigned();
            $table->foreign('maCN')->references('maCN')->on('tblChuyenNganh');
            $table->integer('maKhoa')->unsigned();
            $table->foreign('maKhoa')->references('maKhoa')->on('tblKhoaHoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblLop');
    }
}
