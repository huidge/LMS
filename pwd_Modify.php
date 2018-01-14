<?php
include ("check_login.php"); 
 session_start();
include("conn/conn.php");
$sql=mysql_query("select * from tb_library");
$info=mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理系统</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script language="javascript">
function checkForm(form){
	if(form.oldpwd.value==""){
		alert("请输入的原密码!");form.oldpwd.focus();return false;
	}
	if(form.oldpwd.value!=form.holdpwd.value){
		alert("您输入的原密码不正确，请重新输入!");form.oldpwd.value="";
		form.oldpwd.focus();return false;
	}
	if(form.pwd.value==""){
		alert("请输入的新密码!");form.pwd.focus();return false;
	}	
	if(form.pwd1.value==""){
		alert("请确认新密码!");form.pwd1.focus();return false;
	}	
	if(form.pwd.value!=form.pwd1.value){
		alert("您两次输入的新密码不一致，请重新输入!");
		form.pwd.value="";form.pwd1.value="";
		form.pwd.focus();return false;
	}
}
}
</script>
</head>
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
<?php
include("Conn/conn.php");
$query3=mysql_query("select pwd from tb_manager where name='$_SESSION[admin_name]'");
$info3=mysql_fetch_array($query3);
?>
<form name="form1" method="post" action="library_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名称：</label>
		<div class="col-sm-10">
			<input name="name" type="text" class="form-control" id="name" value="<?php echo $_SESSION["admin_name"];?>" readonly="yes">
		</div> 
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">原密码：</label>
		<div class="col-sm-10">
			<input name="oldpwd" type="password" id="oldpwd" size="30" class="form-control">
			<input type="hidden" name="holdpwd" class="form-control" id="holdpwd" 
				   value="<?php echo $info3["pwd"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">新密码：</label>
		<div class="col-sm-10">
			<input name="pwd" type="password" class="form-control" id="pwd" >
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">确认新密码：</label>
		<div class="col-sm-10">
			<input name="pwd1" type="password" class="form-control" id="pwd1" >
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit" type="submit" class="btn btn-primary" onClick="return checkForm(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="reset" class="btn btn-danger" value="取消">取消</button>
		</div>		
	</div>
</form>

</body>
</html>