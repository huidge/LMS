<?php
include ("check_login.php"); 
include("conn/conn.php");
if($_POST[submit]!=""){
$name=$_POST[name];
$pwd=$_POST[pwd];
if($name != "" && $pwd != "")
{
	$sql=mysql_query("insert into tb_manager (name,pwd) values('$name','$pwd')");
if($sql==true){
echo "<script language=javascript>alert('管理员添加成功！');window.location.href='manager.php';</script>";
}
else{
echo "<script language=javascript>alert('管理员添加失败！');window.location.href='manager.php';</script>";
}
}
else{
echo "<script language=javascript>alert('管理员添加失败！');window.location.href='manager.php';</script>";
}
}
?>

