<?php
include ("check_login.php"); 
 if (!session_id()) session_start();?>
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
$sql=mysql_query("select r.id,r.barcode,r.name,t.name as typename,r.paperType,r.paperNO,r.tel,r.email from tb_reader as r join (select * from tb_readertype) as t on r.typeid=t.id");
$info=mysql_fetch_array($sql);
if($info==false){
?> <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无读者信息！</td>
            </tr>
          </table>
<div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='reader_add.php'">添加读者信息</button>
</div>
 <?php 
}else{
  ?>

<table class="table table-hover">
	<thead>
		<tr  bgcolor="#E6E6FA">
			<th >条形码</th>
			<th >姓名</th>
			<th >读者类型</th>
			<th >证件类型</th>
			<th >证件号码</th>
			<th >电话</th>
			<th >mail</th>
			<th >操作</th>
		</tr>
	</thead>
	<tbody>

<?php 
do{
?> 
 <tr>
    <td><?php echo $info["barcode"];?> </td>  
    <td><a href="reader_info.php?id=<?php echo $info["id"]; ?> "><?php echo $info["name"];?> </a></td>
    <td style="padding:5px;"><?php echo $info["typename"];?> </td>
    <td><?php echo $info["paperType"];?> </td>
    <td ><?php echo $info["paperNO"];?> </td>
    <td>&nbsp;<?php echo $info["tel"];?> </td>
    <td align="left">&nbsp;<?php echo $info["email"];?> </td>
    <td ><a class="btn btn-primary" href="reader_modify.php?id=<?php echo $info["id"];?>">修改</a>
    <a class="btn btn-primary" href="reader_del.php?id=<?php echo $info["id"];?> ">删除</a></td>
  </tr>
<?php 
  }while($info=mysql_fetch_array($sql));
}
?>  
	</tbody>
</table>
<div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='reader_add.php'">添加读者信息</button>
</div>
       

</body>
</html>