<?php 
//include ("check_login.php"); 
include("conn/conn.php");
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
<body style="margin-left:18%;margin-top:20px;height:50%;width:81%">

<table class="table table-hover">
	<caption>图书借阅排行榜</caption>
	<thead>
		<tr bgcolor="#E6E6FA">
			<th>排名</th>
			<th>图书条形码</th>
			<th>图书名称</th>
			<th>图书类型</th>
			<th>书架</th>
			<th>出版社</th>
			<th>作者</th>
			<th>定价(元)</th>
			<th>借阅次数</th>
		</tr>
	</thead>
	<tbody>
		<?php
					$sql=mysql_query("select * from (select bookid,count(bookid) as degree from tb_borrow group by bookid) as borr join (select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id where b.del=0) as book on borr.bookid=book.id order by borr.degree desc limit 10");
					$info=mysql_fetch_array($sql);
					$i=1;
					do{
					?>
		<tr>
				<td ><?php echo $i;?></td>
                <td ><?php echo $info["barcode"];?></td>
                <td ><?php echo $info["bookname"];?></td>
                <td ><?php echo $info["typename"];?></td>
                <td ><?php echo $info["bookcasename"];?></td>
                <td ><?php echo $info["pubname"];?></td>
                <td ><?php echo $info["author"];?></td>
                <td ><?php echo $info["price"];?></td>
                <td ><?php echo $info["degree"];?></td>
		</tr>
              <?php 
				 $i=$i+1;
				 }while($info=mysql_fetch_array($sql));
				?>
	</tbody>
</table>

</body>
</html>