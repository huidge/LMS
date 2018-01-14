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
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<?php
	include("conn/conn.php");
	$sql=mysql_query("select book.barcode,book.id as bookid,book.bookname,bt.typename,book.typeid,book.author,book.ISBN,book.translator,book.bookcase,pb.pubname,book.price,book.page,bc.name from tb_bookinfo book join tb_booktype bt on book.typeid=bt.id join tb_publishing pb on book.ISBN=pb.ISBN join tb_bookcase bc on book.bookcase=bc.id where book.id=$_GET[id]");
	$info=mysql_fetch_array($sql);
	?>
<form name="form1" method="post" action="book_modify_ok.php" class="form-horizontal">
	
 <input type="hidden" name="bid" value="<?php echo $info[book.id 

];?>">
<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">条形码</label>
		<div class="col-sm-10">
			<input name="barcode" type="text" class="form-control" id="barcode" value="<?php echo $info["barcode"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书名称</label>
		<div class="col-sm-10">
			<input name="bookName" type="text" class="form-control" id="bookName" value="<?php echo $info["bookname"];?>">
		</div>
	</div>

	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">图书类型</label>
		<div class="col-sm-10">
		<select name="typeId" class="form-control" id="typeId">
<?php
  $sql1=mysql_query("select * from tb_booktype");
	$info1=mysql_fetch_array($sql1);
  do{
?> 		
				
          <option  value="<?php echo $info1["id"];?>" <?php if($info1["id"]==$info["typeid"]){?> selected <?php }?>><?php echo $info1["typename"];?></option>
<?php
}while($info1=mysql_fetch_array($sql1));
?> 
        </select>   
        </div>     
</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-10">
			<input name="author" type="text" class="form-control" id="author"  value="<?php echo $info["author"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">译者</label>
		<div class="col-sm-10">
			<input name="translator" type="text" class="form-control" id="translator" value="<?php echo $info["translator"];?>">
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
				
     <option value="<?php echo $info2["ISBN"];?>"<?php if($info2["ISBN"]==$info["ISBN"]){?> selected <?php }?>><?php echo $info2["pubname"];?></option>
<?php
}while($info2=mysql_fetch_array($sql2));
?> 
        </select>   
        </div>     
</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">价格</label>
		<div class="col-sm-10">
			<input name="price" type="text" class="form-control" id="price" value="<?php echo $info["price"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">页码</label>
		<div class="col-sm-10">
			<input name="page" type="text" class="form-control" id="page" value="<?php echo $info["page"];?>">
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
				
          <option value="<?php echo $info3["id"];?>"<?php if($info3["id"]==$info["bookcase"]){?> selected <?php }?>><?php echo $info3["name"];?></option>
		<?php }while($info3=mysql_fetch_array($sql3));?> 
        </select>
            <input name="operator" type="hidden" id="operator" value="<?php echo $info3["name"];?>"></td>   
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