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
    date_default_timezone_set('UTC');
    $time=date("Y-m-d");
    $sql=mysql_query("select book.barcode,book.bookname,reader.barcode as readerbarcode,reader.name,borr.borrowTime,borr.backTime,borr.ifback from tb_bookinfo book join tb_borrow  as borr on book.id=borr.bookid join tb_reader as reader on borr.readerid=reader.id  where borr.backTime<='$time' and borr.ifback=0");
    $info=mysql_fetch_array($sql);
    if($info==false){
    ?>
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无到期提醒信息！</td>
            </tr>
          </table>
 <?php
}else{
?>
   
<table class="table table-hover">
	<thead>
  <tr align="center" bgcolor="#E6E6FA">
    <th >图书条形码</th>
    <th >图书名称</th>
    <th >读者条形码</th>
    <th >读者名称</th>
    <th >借阅时间</th>
    <th >应还时间</th>
    </tr>
	</thead>
	<tbody>

<?php 
do{
?> 
<tr>
 <tr align="center">
    <td >&nbsp;<?php echo $info["barcode"];?></td>
    <td ><?php echo $info["bookname"];?></td>
    <td>&nbsp;<?php echo $info["readerbarcode"];?></td>
    <td >&nbsp;<?php echo $info["name"];?></td>
    <td >&nbsp;<?php echo $info["borrowTime"];?></td>
    <td >&nbsp;<?php echo $info["backTime"];?></td>
    </tr>
<?php 
  }while($info=mysql_fetch_array($sql));
}
?>  
	</tbody>
</table>
</body>
</html>