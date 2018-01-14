<?php
include ("check_login.php"); 
 if (!session_id()) session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>添加书架信息</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script language="javascript">
function check(form){
	if(form.name.value==""){
		alert("请输入书架名!");form.barcode.focus();return false;
	}
}
</script>
</head>

<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<form name="form1" method="post" action="bookcase_add_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">书架名称</label>
		<div class="col-sm-10">
			<input type="text" name="name" class="form-control" id="name" >
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="submit1" type="submit" class="btn btn-primary" onClick="check(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="reset" class="btn btn-danger" value="取消" >取消</button>
		</div>		
	</div>




 </form>
</body>
</html>