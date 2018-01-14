<?php
include ("check_login.php"); 
 if (!session_id()) session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理系统</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script language="javascript">
function check(form){
	if(form.name.value==""){
		alert("请输入类型名称!");form.name.focus();return false;
	}
	if(form.number.value==""){
		alert("请输入可借数量!");form.number.focus();return false;
	}	
}
</script>

<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<form name="form1" method="post" action="readerType_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">类型名称</label>
		<div class="col-sm-10">
			<input type="text" name="name" class="form-control" id="name" >
		</div>
	</div>

		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">可借数量</label>
		<div class="col-sm-10">
			<input type="text" name="number" class="form-control" id="number" >
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit" type="submit" class="btn btn-primary" onClick="check(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="button" class="btn btn-danger" value="关闭" onClick="history.back();">关闭</button>
		</div>		
	</div>




 </form>
</body>
</html>