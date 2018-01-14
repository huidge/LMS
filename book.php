<?php
include ("check_login.php"); 
 if (!session_id()) session_start();
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
<?php
    include("Conn/conn.php");
    $query=mysql_query("select book.barcode,book.id as bookid,book.bookname,bt.typename,pb.pubname,bc.name from tb_bookinfo book join tb_booktype bt on book.typeid=bt.id join tb_publishing pb on book.ISBN=pb.ISBN join tb_bookcase bc on book.bookcase=bc.id");
    $result=mysql_fetch_array($query);
        if($result==false){
    ?> 
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无图书信息！</td>
            </tr>
          </table>
   <div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='book_add.php'">添加图书信息</button>
</div>
 <?php
}else{
?>
   
<table class="table table-hover">
	<thead>
		<tr  bgcolor="#E6E6FA">
			<th >条形码</th>
			<th >图书名称</th>
			<th >图书类型</th>
			<th >出版社</th>
			<th >书架</th>
			<th >修改</th>
			<th >删除</th>
		</tr>
	</thead>
	<tbody>

<?php 
do{
?> 
<tr>
    <td>&nbsp;<?php echo $result["barcode"];?></td>  
    <td><a href="book_look.php?id=<?php echo $result["bookid"];?>"><?php echo $result["bookname"];?></a></td>
    <td>&nbsp;<?php echo $result["typename"];?></td>  
    <td>&nbsp;<?php echo $result["pubname"];?></td>  
    <td>&nbsp;<?php echo $result["name"];?></td>  
    <td ><a class="btn btn-primary" href="book_Modify.php?id=<?php echo $result["bookid"];?>">修改</a></td>
    <td ><a class="btn btn-primary" href="book_del.php?id=<?php echo $result["bookid"];?>">删除</a></td>
  </tr>
<?php 
  }while($result=mysql_fetch_array($query));
}
?>  
	</tbody>
</table>
<div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='book_add.php'">添加图书信息</button>
</div>
</body>
</html>