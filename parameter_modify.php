<?php
include ("check_login.php"); 
 session_start();
include("conn/conn.php");
$sql=mysql_query("select * from tb_parameter");
$info=mysql_fetch_object($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理系统</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
<form name="form1" method="post" action="parameterModify_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">办证费</label>
		<div class="col-sm-10" ">
			<input name="cost" type="text" class="form-control" id="cost" 
				   value="<?php echo $info->cost; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">有效期限</label>
		<div class="col-sm-10">
			<input type="text" name="validity" class="form-control" id="validity" 
				   value="<?php echo $info->validity; ?>">
		</div>
	</div>
	<div style="text-align:center" class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit" type="submit" class="btn btn-primary " onClick="return checkForm(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="reset" class="btn btn-danger " value="取消">取消</button>
		</div>		
	</div>
</form>

</body>
</html>