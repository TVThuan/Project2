<?php
Route::get("list",array("uses"=>"SinhVienController@getAll"));
Route::get("them",array("uses"=>"SinhVienController@getAllLop"));
Route::post("them",array("uses"=>"SinhVienController@insert"));
Route::get("xoa/{ma}",array("uses"=>"SinhVienController@deleteById"));
Route::get("sua/{ma}",array("uses"=>"SinhVienController@getById"));
Route::post("sua/suaxong",array("uses"=>"SinhVienController@update"));