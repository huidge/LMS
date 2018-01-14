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
$sql=mysql_query("select m.id,m.name,p.sysset,p.readerset,p.bookset,p.borrowback,p.sysquery from tb_manager as m left join (select * from tb_purview)as p on m.id=p.id");
$info=mysql_fetch_array($sql);
if($info==false){
?>
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无管理员信息！</td>
            </tr>
          </table>
<div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='manager_add.php'">添加管理员信息</button>
</div>
 <?php
}else{
 ?>

<table class="table table-hover">
	<thead>
		<tr  bgcolor="#E6E6FA">
			<th>管理员名称</th>
			<th>系统设置</th>
			<th>读者管理</th>
			<th>图书档案管理</th>
			<th>图书借还</th>
			<th>系统查询</th>
			<th>权限设置</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>

<?php do{?> 
  <tr>
    <td><?php echo $info["name"];?></td>
    <td ><input class="noborder" name="checkbox" type="checkbox"  value="checkbox" disabled="disabled" <?php if($info["sysset"]==1){echo ("checked");}?>></td>
    <td ><input name="checkbox" type="checkbox"  value="checkbox" disabled="disabled" <?php if($info["readerset"]==1){echo("checked");}?>></td>
    <td ><input name="checkbox" type="checkbox"  value="checkbox" disabled <?php if($info["bookset"]==1){echo("checked");}?>></td>
    <td ><input name="checkbox" type="checkbox"  value="checkbox" disabled <?php if($info["borrowback"]==1){echo("checked");}?>></td>
    <td ><input name="checkbox" type="checkbox"  value="checkbox" disabled <?php if($info["sysquery"]==1){echo("checked");}?>></td>
    <td ><a class="btn btn-primary" href="#" onClick="self.location.href='manager_modify.php?id=<?php echo $info["id"]; ?>'">权限设置</a></td>
    <td ><a class="btn btn-primary" href="manager_del.php?id=<?php echo $info["id"];?>">删除</a></td>
  </tr>
<?php
  }while($info=mysql_fetch_array($sql));
}
?>  
	</tbody>
</table>

    <div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='manager_add.php'">添加管理员信息</button>
</div>     
</body>
</html>