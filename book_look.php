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
</head>
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<?php 
        include("conn/conn.php");
        $sql=mysql_query("select book.barcode,book.id as bookid,book.bookname,bt.typename,book.author,book.translator,pb.pubname,book.price,book.page,bc.name from tb_bookinfo book join tb_booktype bt on book.typeid=bt.id join tb_publishing pb on book.ISBN=pb.ISBN join tb_bookcase bc on book.bookcase=bc.id where book.id=$_GET[id]");
		$info=mysql_fetch_array($sql);
		?>
<form name="form1" method="post" action="reader_ok.php" class="form-horizontal">
	

<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">条形码</label>
		<div class="col-sm-10">
			<input name="barcode" type="text" class="form-control" id="barcode"
			value="<?php echo $info["barcode"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书名称</label>
		<div class="col-sm-10">
			<input name="bookName" type="text" class="form-control" id="bookName" 
			value="<?php echo $info["bookname"];?>">
		</div>
	</div>

	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">图书类型</label>
		<div class="col-sm-10">
		<input name="typeId" class="form-control" id="typeId" value="<?php echo $info["typename"];?>">   
        </div>     
</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-10">
			<input name="author" type="text" class="form-control" id="author" value="<?php echo $info["author"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">译者</label>
		<div class="col-sm-10">
			<input name="translator" type="text" class="form-control" id="translator" 
			value="<?php echo $info["translator"];?>">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">出版社</label>
		<div class="col-sm-10">
		<input name="isbn" class="form-control" id="isbn" value="<?php echo $info["pubname"];?>">	   
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
<input name="bookcaseid" type="text" class="form-control" id="bookcaseid" value="<?php echo $info["name"];?>">
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