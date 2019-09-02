<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDiem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tblDiem',function(Blueprint $table){
            $table->integer('maSv')->unsigned();
            $table->foreign('maSv')->references('maSv')->on('tblSinhVien');
            $table->integer('maMon')->unsigned();
            $table->foreign('maMon')->references('maMon')->on('tblMon');
            $table->integer('diemThiFinalLan1')->nullable();
            $table->integer('diemThiFinalLan2')->nullable();
            $table->integer('diemThiSkillLan1')->nullable();
            $table->integer('diemThiSkillLan2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::drop('tblDiem');
    }
}
