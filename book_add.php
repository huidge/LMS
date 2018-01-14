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
function check(form){
	if(form.barcode.value==""){
		alert("请输入条形码1!");form.barcode.focus();return false;
	}
	if(form.bookName.value==""){
		alert("请输入图书姓名!");form.bookName.focus();return false;
	}
	if(form.price.value==""){
		alert("请输入图书定价!");form.price.focus();return false;
	}
form.submit();
}
</script>
</head>
<body style="margin-left:10%;margin-top:20px;height:50%;width:80%">
<form name="form1" method="post" action="book_ok.php" class="form-horizontal">
	

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">条形码</label>
		<div class="col-sm-10">
			<input name="barcode" type="text" class="form-control" id="barcode">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书名称</label>
		<div class="col-sm-10">
			<input name="bookName" type="text" class="form-control" id="bookName">
		</div>
	</div>

	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">图书类型</label>
		<div class="col-sm-10">
		<select name="typeId" class="form-control" id="typeId">
<?php
  include("conn/conn.php");
  $sql=mysql_query("select * from tb_booktype");
  $info=mysql_fetch_array($sql);
  do{
?> 		
				
          <option value="<?php echo $info["id"];?>"><?php echo $info["typename"];?></option>
<?php
}while($info=mysql_fetch_array($sql));
?> 
        </select>   
        </div>     
</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-10">
			<input name="author" type="text" class="form-control" id="author">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">译者</label>
		<div class="col-sm-10">
			<input name="translator" type="text" class="form-control" id="translator">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">出版社</label>
		<div class="col-sm-10">
		<select name="isbn" class="form-control" id="isbn">
<?php
  $sql2=mysql_query("select * from tb_publishing");
  $info2=mysql_fetch_array($sql2);
  do{
?> 		
				
          <option value="<?php echo $info2["ISBN"];?>"><?php echo $info2["pubname"];?></option>
<?php
}while($info2=mysql_fetch_array($sql2));
?> 
        </select>   
        </div>     
</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">价格</label>
		<div class="col-sm-10">
			<input name="price" type="text" class="form-control" id="price">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">页码</label>
		<div class="col-sm-10">
			<input name="page" type="text" class="form-control" id="page">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">书架</label>
		<div class="col-sm-10">
		<select name="bookcaseid" class="form-control" id="bookcaseid">
<?php
  $sql3=mysql_query("select * from tb_bookcase");
  $info3=mysql_fetch_array($sql3);
  do{
?> 		
				
          <option value="<?php echo $info3["id"];?>"><?php echo $info3["name"];?></option>
<?php
}while($info3=mysql_fetch_array($sql3));
?> 
        </select>   
                  <input name="operator" type="hidden" id="operator" value="<?php echo $info3["name"];?>">
        </div>     
</div>


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit" type="submit" class="btn btn-primary" onClick="return check(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="button" class="btn btn-danger" value="返回" onClick="history.back()">返回</button>
		</div>		
	</div>
</form>

</body>
</html>