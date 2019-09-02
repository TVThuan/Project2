<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form method="post" action="suaxong">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>" />
Ma<input type="text" name="txtMa" value="{{$sv->ma}}"/>
<bR />
Ten<input type="text" name="txtTen" value="{{$sv->ten}}"/>
<bR />
<fieldset>
	<legend>Gioi tinh</legend>
    <input type="radio" name="rdoGT" value="1" checked="checked"    />Nam
    
    <input type="radio" name="rdoGT" value="0"
    @if($sv->gt==0)
    	checked="checked"
     @endif
     />Nu
     
</fieldset>
Lop<select name="cboLop">
		<option value="">Chon</option>
        @foreach($dslop as $lop)
        	<option value="{{$lop->ma}}" 
            		@if($lop->ma==$sv->malop) 
                    	selected="selected"
                    @endif
            >
            	{{$lop->ten}}
            </option>
        @endforeach
	</select>
    <br />
    <input type="submit" value="Cap Nhat sinh vien"/>
 </form>
</body>
</html>