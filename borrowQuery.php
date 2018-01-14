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
  <script language="javascript">
function check(myform){
  if(myform.flag1.checked==false && myform.flag2.checked==false){
    alert("请选择查询方式!");return false;
  }
  if (myform.flag1.checked){
    if(myform.key1.value==""){
      alert("请输入正确的查询关键字");myform.key1.focus();return false;
  }
}
  if (myform.flag2.checked){
    if(myform.sdate.value==""){
      alert("请输入开始日期");myform.sdate.focus();return false;
    }   
    if(CheckDate(myform.sdate.value)){
      alert("您输入的开始日期不正确（如：2007-12-01）\n 请注意闰年!");myform.sdate.focus();return false;
    }
    if(myform.edate.value==""){
      alert("请输入结束日期");myform.edate.focus();return false;
    }   
    if(CheckDate(myform.edate.value)){
      alert("您输入的结束日期不正确（如：2007-12-01）\n 请注意闰年!");myform.edate.focus();return false;
    }
  }
}
</script>
</head>

<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">

        <form  class="form-inline" name="myform" method="post" action="">
            <table>
              <div>
              <input name="flag1" type="checkbox" class="noborder" value="a" checked>
              请选择查询依据：
                <select name="f" class="form-control" id="f" width="37">
                  <option value="k.barcode" >图书条形码</option>
                  <option value="k.bookname">图书名称</option>
                  <option value="r.barcode">读者条形码</option>
                  <option value="r.name">读者名称</option>
                </select>
<div class="form-group">
    <label class="sr-only" for="name"></label>
    <input name="key1" type="text" id="key1" class="form-control" size="50">
  </div>
  <button name="Submit" type="submit" class="btn btn-primary" value="查询" onClick="return check(myform);">查询</button>
  
 
  </div>
  <div style="margin-top:10px">

                  <input name="flag2" type="checkbox" class="noborder" id="flag" value="b">
              借阅时间： 从
              <input class="form-control" name="sdate" type="text" id="sdate">
              到
              <input class="form-control" name="edate" type="text" id="edate">
              (日期格式为：2007-12-01)
            </div>
            </table>
          </form>
          <?php 
include("conn/conn.php");
$sql=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id");
if($_POST["Submit"]!=""){
  $f=$_POST["f"];
  $key1=$_POST["key1"];
  $sdate=$_POST["sdate"];
  $edate=$_POST["edate"];
  $flag1=$_POST["flag1"];
  $flag2=$_POST["flag2"];
  if($flag1=="a"){
  $sql=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id where $f like '%$key1%'");
  }
  if($flag2=="b"){
  $sql=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id where borrowTime between '$sdate' and '$edate'");
  }
  if($flag1=="a" && $flag2=="b"){
  $sql=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id where borrowTime between '$sdate' and '$edate' and $f like '%$key1%'");
  }
}
$result=mysql_fetch_array($sql);
if($result==false){
?>
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无图书借阅信息！</td>
            </tr>
          </table>
          <?php
}
else{
?>
          <table  class="table table-hover">
            <tr  bgcolor="#E6E6FA">
              <th>图书条形码</th>
              <th>图书名称</th>
              <th>读者条形码</th>
              <th>读者名称</th>
              <th>借阅时间</th>
              <th>归还时间</th>
              <th>是否归还</th>
            </tr>
            <?php
do{
if($result["ifback"]=="0"){
    $ifbackstr="未归还";
}else{
    $ifbackstr="已归还";
}
?>
            <tr>
              <td ><?php echo $result["barcode"];?></td>
              <td ><a href="book_look.php?id=<?php echo $result["id"]; ?>"><?php echo $result["bookname"];?></a></td>
              <td ><?php echo $result["readerbarcode"];?></td>
              <td ><?php echo $result["name"];?></td>
              <td ><?php echo $result["borrowTime"];?></td>
              <td ><?php echo $result["backTime"];?></td>
              <td ><?php echo $ifbackstr;?></td>
            </tr>
            <?php
  }while($result=mysql_fetch_array($sql));
}
?>
          </table>
    </table></td>
</table></td>
  </tr>
</table>
</td>
  </tr>
</table>
</body>
</html>