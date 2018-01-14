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

	<form name="form1" method="post" action="manager_modify_ok.php" class="form-horizontal">
<?php 
include("conn/conn.php");
$id=$_GET["id"];
$query=mysql_query("select m.id,m.name,p.sysset,p.readerset,p.bookset,p.borrowback,p.sysquery from tb_manager as m left join (select * from tb_purview)as p on m.id=p.id where m.id='$id'");
$info=mysql_fetch_array($query);
?>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-10">
          <input class="form-control" name="id" type="hidden" value="<?php echo $info["id"];?>">
          <input class="form-control" name="name" type="text" readonly="yes" value="<?php echo $info["name"];?>">
		</div>
	</div>
	<label for="lastname" class="col-sm-2 control-label">拥有的权限</label>
	          
      <div>
	<label class="checkbox-inline">
		<input  name="sysset" type="checkbox" id="sysset" value="1" <?php if($info["sysset"]==1){ echo("checked");}?>> 系统设置
	</label>
	<label class="checkbox-inline">
		<input name="readerset" type="checkbox" id="readerset" <?php if($info["readerset"]==1){ echo("checked");}?>> 读者管理
	</label>
	<label class="checkbox-inline">
		<input name="bookset" type="checkbox" id="bookset" <?php if($info["bookset"]==1){echo("checked");}?>> 图书管理
	</label>
	<label class="checkbox-inline">
		<input name="borrowback" type="checkbox" name="borrowback" id="borrowback" value="1" <?php if($info["borrowback"]==1){echo("checked");}?>> 图书借还
	</label>
	<label class="checkbox-inline">
		<input type="checkbox" name="sysquery" id="sysquery"  value="1" <?php if($info["sysquery"]==1){echo("checked");}?>> 系统查询
	</label>
</div>
        </table>
 </div>




	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="submit" type="submit" class="btn btn-primary" value="保存">保存</button>
			<button name="Submit2"  type="button" class="btn btn-danger" value="关闭" onClick="history.back();">关闭</button>
		</div>		
	</div>




 </form>
</body>
</html>