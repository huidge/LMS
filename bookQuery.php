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
          <form class="form-inline" name="form1" method="post" action="">
          <table bordercolor="#FFFFFF" bgcolor="#9ECFEE">
  <tr>
    <td >
&nbsp;</td>
    <td>&nbsp;&nbsp;请选择查询依据：
      <select name="f" class="form-control" id="f" width="37">
        <option value="<?php echo "b.barcode";?>">条形码</option>
        <option value="<?php echo "t.typename";?>">类别</option>
        <option value="<?php echo "b.bookname";?>" selected>书名</option>
        <option value="<?php echo "b.author";?>">作者</option>
        <option value="<?php echo "p.pubname";?>">出版社</option>
        <option value="<?php echo "c.name";?>">书架</option>
                  </select>
<div class="form-group">
    <label class="sr-only" for="name"></label>
    <input name= "key1" type="text" class="form-control" id="key1">
  </div>
  <button type="submit" class="btn btn-primary" value="查询">查询</button>
    </td>
  </tr>
</table>
</form>
<?php
    include("Conn/conn.php");
    $query=mysql_query("select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id");
    $result=mysql_fetch_array($query);
        if($result==false){
    ?> 
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无图书信息！</td>
            </tr>
          </table>
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
		</tr>
	</thead>
	<tbody>

<?php
if($_POST["key1"]==""){
do{
?>
  <tr>
    <td>&nbsp;<?php echo $result["barcode"];?></td>  
    <td><a href="book_look.php?id=<?php echo $result["id"]; ?>"><?php echo $result["bookname"];?></a></td>
    <td>&nbsp;<?php echo $result["typename"];?></td>  
    <td>&nbsp;<?php echo $result["pubname"];?></td>  
    <td>&nbsp;<?php echo $result["bookcasename"];?></td>  
    </tr>
<?php
  }while($result=mysql_fetch_array($query));
}else{
$f=$_POST["f"];
$key1=$_POST["key1"];
$sql=mysql_query("select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id where $f like '%$key1%'");
$info=mysql_fetch_array($sql);
if($info==true){
do{
?>
  <tr>
    <td >&nbsp;<?php echo $info["barcode"]; ?></td>  
    <td ><a href="book_look.php?id=<?php echo $info["id"]; ?>"><?php echo $info["bookname"]; ?></a></td>
    <td>&nbsp;<?php echo $info["typename"]; ?></td>  
    <td>&nbsp;<?php echo $info["pubname"]; ?></td>  
    <td>&nbsp;<?php echo $info["bookcasename"]; ?></td>  
    </tr>
<?php
}while($info=mysql_fetch_array($sql));
}else{
?>
    <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
       <tr>
         <td height="36" align="center">您检索的图书信息不存在，请重新检索！</td>
       </tr>
    </table>
<?php
}
}
}
?>  
	</tbody>
</table>
</body>
</html>