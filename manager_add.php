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
<script language="javascript">
function check(form1){
	if(form1.name.value==""){
		alert("请输入管理员名称!");form1.name.focus();return false;
	}
	if(form1.pwd.value==""){
		alert("请输入管理员密码!");form1.pwd.focus();return false;
	}
	if(form1.pwd1.value==""){
		alert("请确认管理员密码!");form1.pwd1.focus();return false;
	}		
	if(form1.pwd.value!=form1.pwd1.value){
		alert("您两次输入的管理员密码不一致，请重新输入!");form1.pwd1.focus();return false;
	}
}
</script>
</head>

<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<form name="form1" method="post" action="manager_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-10">
			<input type="text" name="name" class="form-control" id="name" >
		</div>
	</div>
		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员密码</label>
		<div class="col-sm-10">
			<input type="text" name="pwd" class="form-control" id="pwd" >
		</div>
	</div>
		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">确认密码</label>
		<div class="col-sm-10">
			<input type="text" name="pwd1" class="form-control" id="pwd1" >
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="submit" type="submit" class="btn btn-primary" onClick="check(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="button" class="btn btn-danger" value="关闭" onClick="history.back();">关闭</button>
		</div>		
	</div>




 </form>
</body>
</html>