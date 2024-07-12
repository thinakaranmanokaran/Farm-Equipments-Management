<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
$uname=$_SESSION['uname'];
$user=$_SESSION['user'];

$month=date("m");
$year=date("Y");
$q11=mysql_query("select * from street_login where username='admin'");
	$r11=mysql_fetch_array($q11);
//Spring---march,apr,may
//Summer---jun,jul,aug
//Autumn---sep,oct,nov
//Winter---dec,jan,feb
if(isset($btn))
{
	$q1=mysql_query("select * from street_usage where month=$month && year=$year");
	$n1=mysql_num_rows($q1);
	if($n1==0)
	{
		$q2=mysql_query("select * from street_det");
		while($r2=mysql_fetch_array($q2))
		{
	$mq=mysql_query("select max(id) from street_usage");
	$mr=mysql_fetch_array($mq);
	$id=$mr['max(id)']+1;
	$light=$r2['light'];
	mysql_query("insert into street_usage(id,light,power_usage,month,year) values($id,'$light','0','$month','$year')");
		mysql_query("update street_det set level=$level where id=".$r2['id']."");
		}
	mysql_query("update street_det set status=1");
	}
	else
	{
		$q2=mysql_query("select * from street_det");
		while($r2=mysql_fetch_array($q2))
		{
	mysql_query("update street_det set status=1,level=$level where id=".$r2['id']."");
		}
	}
mysql_query("update street_login set light_mode='1',level=$level where username='admin'");
?>
<script language="javascript">
window.location.href="status.php";
</script>
<?php
}
if(isset($level))
{
mysql_query("update street_det set level=$level");
mysql_query("update street_login set level='$level' where username='admin'");
?>
<script language="javascript">
window.location.href="status.php";
</script>
<?php
}
if(isset($btn2))
{
mysql_query("update street_det set status=0");
mysql_query("update street_login set light_mode='0' where username='admin'");
?>
<script language="javascript">
window.location.href="status.php";
</script>
<?php
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
   <?php include("link_admin.php"); ?>
   <p align="center">
     <select name="level" onchange="this.form.submit()">
       <option value="3" <?php if($r11['level']=="3") echo "selected"; ?>>High Power</option>
       <option value="2" <?php if($r11['level']=="2") echo "selected"; ?>>Medium Power</option>
       <option value="1" <?php if($r11['level']=="1") echo "selected"; ?>>Low Power</option>
     </select>
     <input type="submit" name="btn" value="Switch ON" />
     <input type="submit" name="btn2" value="Switch OFF" />
   </p>
   <table width="1032" border="0" align="center">
     <tr>
       <th width="1000" valign="top" scope="col"><iframe src="monitor2.php" width="1000" height="400" align="middle"></iframe></th>
       <th width="22" valign="top" scope="col"><?php
	  /*if($month>=3 && $month<=5)
	  {
	  ?><img src="images/spring.jpg" width="235" height="131" /><?php
	  }
	  else if($month>=6 && $month<=8)
	  {
	  ?><img src="images/summer.jpg" width="235" height="131" /><?php
	  }
	  else if($month>=9 && $month<=11)
	  {
	  ?><img src="images/fall.jpg" width="235" height="131" /><?php
	  }
	  else
	  {
	  ?><img src="images/winter.jpg" width="235" height="131" /><?php
	  }*/
	  
	  ?></th>
     </tr>
     <tr>
       <th valign="top" scope="row">&nbsp;</th>
       <td valign="top">&nbsp;</td>
     </tr>
   </table>
   <h3 align="center">&nbsp;</h3>
   <p align="center">&nbsp;</p>
   <h3 align="center">&nbsp;</h3>
   <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
   <iframe src="alert.php" width="200" height="100" style="display:block" frameborder="0"></iframe>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
