<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tblMon',function(Blueprint $table){
            $table->increments('maMon');
            $table->String('tenMon',100)->unique();
            $table->integer('maCN')->unsigned();
            $table->foreign('maCN')->references('maCN')->on('tblChuyenNganh');
            $table->tinyinteger('Final');
            $table->tinyinteger('Skill');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('tblMon');
    }
}
