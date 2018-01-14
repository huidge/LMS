<?php
include ("check_login.php"); 
 session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>图书管理系统</title>
  <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script language="javascript">
    function checkreader(form){
      if(form.barcode.value==""){
        alert("请输入读者条形码!");form.barcode.focus();return;
      }
      form.submit();
    }
    function checkbook(form){
      if(form.barcode.value==""){
        alert("请输入读者条形码!");form.barcode.focus();return;
      }   
      if(form.inputkey.value==""){
        alert("请输入查询关键字!");form.inputkey.focus();return;
      }

      if(form.number.value-form.borrowNumber.value<=0){
        alert("您不能再借阅其他图书了!");return;
      }
        form.submit();
     }
    </script>
</head>
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
  <?php
    include("conn/conn.php");
    $sql=mysql_query("select r.*,t.name as typename,t.number from tb_reader r left join tb_readerType t on r.typeid=t.id where r.barcode='".$_POST["barcode"]."'");

    $info=mysql_fetch_array($sql);
  ?>
<form name="form1" method="post" action="" class="form-horizontal">
  

<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">读者条形码：</label>
    <div class="col-sm-10">
      <input name="barcode" type="text" class="form-control" id="barcode" value="<?php echo $info["barcode"];?>">
    </div>

  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button name="Button" type="button" class="btn btn-primary" onClick="checkreader(form1)" value="确定">确定</button>
    </div>    
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
      <input name="readername" type="hidden" class="form-control" id="readername" value="<?php echo $info["name"];?>">
      <input name="readerid" type="text" class="form-control" id="readerid" value="<?php echo $info["id"];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10">
      <input name="sex" type="text" class="form-control" id="bookName" value="<?php echo $info["sex"];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">证件类型</label>
    <div class="col-sm-10">
      <input name="paperType" type="text" class="form-control" id="paperType" value="<?php echo $info["paperType"];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">证件号码</label>
    <div class="col-sm-10">
      <input name="paperNo" type="text" class="form-control" id="paperNo" value="<?php echo $info["paperNO"];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">读者类型</label>
    <div class="col-sm-10">
      <input name="readerType" type="text" class="form-control" id="readerType" value="<?php echo $info["number"];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">可借数量</label>
    <div class="col-sm-10">
      <input name="number" type="text" class="form-control" id="number" value="<?php echo $info["number"];?>">
    </div>
  </div>  
                <div>
                   <div><label for="firstname" class="col-sm-2 control-label">添加的依据</label>
                     <input name="f" type="radio" class="noborder" value="barcode" checked>
                     图书条形码
                     <input name="f" type="radio" class="noborder" value="bookname">图书名称
                        </div>
                 </div>  
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input name="inputkey" type="text" class="form-control" id="inputkey" >
      <button name="Submit" id="Submit" type="button" class="btn btn-primary" onClick="checkbook(form1);" value="确定">确定</button>
       <input name="operator" type="hidden" id="operator" value="<?php echo $_SESSION["adminname"];?>">
    </div>    
  </div>
       <tr>
         <td  ><table class="table table-hover">
                   <tr  bgcolor="#e3F4F7">
                     <td>图书名称</td>
                     <td>借阅时间</td>
                     <td>应还时间</td>
                     <td>出版社</td>
                     <td>书架</td>
                     <td>定价(元)</td>
                   </tr>
<?php
$readerid=$info["id"];
$sql1=mysql_query("select r.*,borr.borrowTime,borr.backTime,book.bookname,book.price,pub.pubname,bc.name as bookcase from tb_borrow as borr join tb_bookinfo as book on book.id=borr.bookid join tb_publishing as pub on book.ISBN=pub.ISBN  join tb_bookcase as bc on book.bookcase=bc.id join tb_reader as r on borr.readerid=r.id  where borr.readerid='$readerid' and borr.ifback=0");

$info1=mysql_fetch_array($sql1);
$borrowNumber=mysql_num_rows($sql1);     
do{
?>
                     <tr>
                       <td><?php echo $info1["bookname"];?></td>
                       <td><?php echo $info1["borrowTime"];?></td>
                       <td><?php echo $info1["backTime"];?></td>
                       <td><?php echo $info1["pubname"];?></td>
                       <td><?php echo $info1["bookcase"];?></td>
                       <td><?php echo $info1["price"];?></td>
                     </tr>
<?php 
}while($info1=mysql_fetch_array($sql1));
?>
    <input name="borrowNumber" type="hidden" id="borrowNumber" value="<?php echo $borrowNumber; ?>">  



                 </table>                 </td>
       </tr>
</form>
<?php
if($_POST["inputkey"]!=""){
$f=$_POST["f"];
$inputkey=trim($_POST["inputkey"]);
$barcode=$_POST["barcode"];
$readerid=$_POST["readerid"];
$borrowTime=date('Y-m-d');
$backTime=date("Y-m-d",(time()+3600*24*30));        //归还图书日期为当前期日期+30天期限
$query=mysql_query("select * from tb_bookinfo where $f='$inputkey'");
$result=mysql_fetch_array($query);   //检索图书信息是否存在
if($result==false){
  echo "<script language='javascript'>alert('该图书不存在！');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
}
else{
  $query1=mysql_query("select r.*,borr.borrowTime,borr.backTime,book.bookname,book.price,pub.pubname,bc.name as bookcase from tb_borrow as borr join tb_reader as r on borr.readerid=r.id join tb_bookinfo as book on book.id=borr.bookid join tb_publishing as pub on book.ISBN=pub.ISBN  join tb_bookcase as bc on book.bookcase=bc.id  where borr.bookid=$result[id] and borr.readerid=$readerid and ifback=0");    //检索该读者所借阅的图书是否与再借图书重复
  $result1=mysql_fetch_array($query1);
  if($result1==true){    //如果借阅的图书已被该读者借阅，那么提示不能重复借阅 
  echo "<script language='javascript'>alert('该图书已经借阅！');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
  }
  else{    //否则，完成图书借阅操作
      $bookid=$result["id"];

      mysql_query("insert into tb_borrow(readerid,bookid,borrowTime,backTime,operator,ifback)values('$readerid','$bookid','$borrowTime','$backTime','$_SESSION[admin_name]',0)");
      echo "<script language='javascript'>alert('图书借阅操作成功！');window.location.href='bookBorrow.php?barcode=$barcode';</script>";
}
}
}
?>
</body>
</html>