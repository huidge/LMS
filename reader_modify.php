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
<script language="javascript">
function checkForm(form){
	if(form.name.value==""){
		alert("请输入读者姓名!");form.name.focus();return false;
	}
	if(form.paperNO.value==""){
		alert("请输入证件号码!");form.paperNO.focus();return false;
	}
}
</script>
</head>
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<?php 
  include("conn/conn.php");
	$query=mysql_query("select * from tb_reader where id='".$_GET["id"]."'");
	$result=mysql_fetch_array($query);
?>
<form name="form1" method="post" action="reader_modifyok.php" class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input name="name" type="text" class="form-control" id="name" value="<?php echo $result["name"];?>">
			<input name="readerid" type="hidden" id="readerid" value="<?php echo $result["id"];?>">
		</div>
	</div>
	<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">性别</label>
	<div>&nbsp;&nbsp;&nbsp;
 <input name="sex" type="radio" class="radio-inline" id="radiobutton"  value="男" <?php if($result["sex"]=="男"){?> checked <?php }?>>男

	<input name="sex" id="radiobutton" type="radio" class="radio-inline" value="女" <?php if($result["sex"]=="女") {?> checked <?php }?>>女
</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">条形码</label>
		<div class="col-sm-10">
			<input type="text" name="barcode" class="form-control" id="barcode" value="<?php echo $result["barcode"];?>">
		</div>
	</div>
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">读者类型</label>
		<div class="col-sm-10">
		<select name="typeid" class="form-control" id="typeid">
<?php
  $sql=mysql_query("select * from tb_readertype");
  $info=mysql_fetch_array($sql);
  do{
?> 		
				
          <option value="<?php echo $info["id"];?>" <?php if($result["typeid"]==$info["id"]){?> selected<?php }?>><?php echo $info["name"];?></option>
              <?php
}while($info=mysql_fetch_array($sql));
?>
        </select>   
        </div>     
</div>
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">职业</label>
		<div class="col-sm-10">
			<input type="text" name="vocation" class="form-control" id="vocation" value="<?php echo $result["vocation"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">出生日期</label>
		<div class="col-sm-10">
			<input type="text" name="birthday" class="form-control" id="birthday" value="<?php echo $result["birthday"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">有效证件</label>
			<div class="col-sm-10">
		<select name="paperType" class="form-control" id="paperType">
          <option value="身份证"  <?php if($result["paperType"]=="身份证"){?> selected <?php }?>>身份证</option>
          <option value="学生证" <?php if($result["paperType"]=="学生证"){?>  selected <?php }?>>学生证</option>
          <option value="军官证" <?php if($result["paperType"]=="军官证"){?>  selected <?php }?>>军官证</option>
          <option value="工作证" <?php if($result["paperType"]=="工作证"){?>  selected <?php }?>>工作证</option>
		</select>
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">证件号码</label>
		<div class="col-sm-10">
			<input type="text" name="paperNO" class="form-control" id="paperNO" value="<?php echo $result["paperNO"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">电话</label>
		<div class="col-sm-10">
			<input type="text" name="tel" class="form-control" id="tel" value="<?php echo $result["tel"];?>">
		</div>
	</div>	

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">E-mail</label>
		<div class="col-sm-10">
			<input type="text" name="email" class="form-control" id="email" value="<?php echo $result["email"];?>">
		</div>
	</div>	

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">备注</label>
		<div class="col-sm-10">
			<input type="text" name="remark" class="form-control" id="remark" value="<?php echo $result["remark"];?>">
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit" type="submit" class="btn btn-primary" onClick="return checkForm(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="button" class="btn btn-danger" value="取消" onClick="history.back()">返回</button>
		</div>		
	</div>
</form>

</body>
</html>