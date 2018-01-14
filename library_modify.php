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
	for(i=0;i<form.length-2;i++){
		if(form.elements[i].value==""){
			alert("请将图书馆信息填写完整!");
			form.elements[i].focus();
			return false;
		}
	}
}
</script>
</head>
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
<form name="form1" method="post" action="library_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书馆名称</label>
		<div class="col-sm-10">
			<input name="libraryname" type="text" class="form-control" id="libraryname" 
				   value="<?php echo $info["libraryname"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">馆长</label>
		<div class="col-sm-10">
			<input type="text" name="curator" class="form-control" id="curator" 
				   value="<?php echo $info["curator"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">联系电话</label>
		<div class="col-sm-10">
			<input name="tel" type="text" class="form-control" id="tel" 
				   value="<?php echo $info["tel"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">联系地址</label>
		<div class="col-sm-10">
			<input type="text" name="address" class="form-control" id="address" 
				   value="<?php echo $info["address"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label"> E-mail</label>
		<div class="col-sm-10">
			<input type="text" name="email" class="form-control" id="email" 
				   value="<?php echo $info["email"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">图书馆网址</label>
		<div class="col-sm-10">
			<input type="text" name="url" class="form-control" id="url" 
				   value="<?php echo $info["url"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">建馆时间</label>
		<div class="col-sm-10">
			<input type="text" name="createDate" class="form-control" id="createDate" 
				   value="<?php echo $info["createDate"];?>">
		</div>
	</div>	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">图书馆简介</label>
		<div class="col-sm-10"> 
<textarea name="introduce" cols="50" rows="3" class="form-control" id="introduce"><?php echo $info["introduce"];?></textarea>

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