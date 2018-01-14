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
include("conn/conn.php");       //连接数据源信息
$sql=mysql_query("select * from tb_bookcase order by id desc");      //查询图书书架信息表中的数据信息
$info=mysql_fetch_array($sql);      //执行SQL语句
if($info==false){      //如果图书书架信息表中为空值，则弹出“暂无书架信息”
?>
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无书架信息！</td>
            </tr>
          </table>
       <div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='bookcase_add.php'">添加书架信息</button>
</div>
 <?php
}else{//否则输出书架信息
?>   
<table class="table table-hover">
	<thead>
		<tr align="center" bgcolor="#E6E6FA">
    <td >书架名称</td>
    <td>删除</td>
		</tr>
	</thead>
	<tbody>

<?php 
do{
?> 
<tr>
    <td><?php echo $info["name"];?></td>
    <td align="center"><a class="btn btn-primary" href="bookcase_del.php?id=<?php echo $info["id"];?>">删除</a></td>
  </tr>
<?php
  }while($info=mysql_fetch_array($sql));          //do...while循环语句结束
}
?>  
	</tbody>
</table>
    <div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='bookcase_add.php'">添加书架信息</button>
</div>
</body>
</html>