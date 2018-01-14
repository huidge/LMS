<?php
include ("check_login.php"); 
 session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理系统</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	include("conn/conn.php");
	$sql=mysql_query("select r.id,r.sex,r.barcode,r.name,t.name as typename,r.vocation,r.birthday,r.paperType,r.paperNO,r.tel,r.email,r.remark  from tb_reader as r join (select * from tb_readertype) as t on r.typeid=t.id where r.id='$_GET[id]'");
	$info=mysql_fetch_array($sql);
?>
</head>
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
<form name="form1" method="post" action="reader_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input name="name" type="text" class="form-control" value="<?php echo $info["name"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">性别</label>
		<div class="col-sm-10">
			<input name="sex" type="text" class="form-control" value="<?php echo $info["sex"];?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">条形码</label>
		<div class="col-sm-10">
			<input type="text" name="barcode" class="form-control" id="barcode" value="<?php echo $info["barcode"];?>">
		</div>
	</div>
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">读者类型</label>
		<div class="col-sm-10">
<input type="text" name="typename" class="form-control" id="typename" value="<?php echo $info["typename"];?>">  
        </div>     
</div>
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">职业</label>
		<div class="col-sm-10">
			<input type="text" name="vocation" class="form-control" id="vocation" value="<?php echo $info["vocation"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">出生日期</label>
		<div class="col-sm-10">
			<input type="text" name="birthday" class="form-control" id="birthday" 
			value="<?php echo $info["birthday"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">有效证件</label>
		<div class="col-sm-10">
			<input type="text" name="paperType" class="form-control" id="paperType" 
			value="<?php echo $info["paperType"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">证件号码</label>
		<div class="col-sm-10">
			<input type="text" name="paperNO" class="form-control" id="paperNO" 
			value="<?php echo $info["paperNO"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">电话</label>
		<div class="col-sm-10">
			<input type="text" name="tel" class="form-control" id="tel" value="<?php echo $info["tel"];?>">
		</div>
	</div>	

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">E-mail</label>
		<div class="col-sm-10">
			<input type="text" name="email" class="form-control" id="email" value="<?php echo $info["email"];?>">
		</div>
	</div>	

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">备注</label>
		<div class="col-sm-10">
			<input type="text" name="remark" class="form-control" id="remark"  value="<?php echo $info["remark"];?>">
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit2" id="Submit2" type="button" class="btn btn-primary" value="返回" onClick="history.back()">返回</button>
		</div>		
	</div>
</form>

</body>
</html>