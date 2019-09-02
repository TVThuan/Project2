<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="them">Them moi 1 sinh vien</a>
<br />
<table border="1" cellspacing="0px">
	<tr>
    	<td>Ma</td>
        <td>Ten</td>
        <td>Gioi tinh</td>
        <td>Ma lop</td>
        <td></td>
        <td></td>
    </tr>
    @foreach($ds as $sv)
    <tr>
    	<td>{{$sv->ma}}</td>
        <td>{{$sv->ten}}</td>
        <td>{{$sv->gt}}</td>
        <td>{{$sv->malop}}</td>
        <td><a href="sua/{{$sv->ma}}">sua</a></td>
        <td><a href="xoa/{{$sv->ma}}">xoa</a></td>
    </tr>
    @endforeach
</table>
</body>
</html>