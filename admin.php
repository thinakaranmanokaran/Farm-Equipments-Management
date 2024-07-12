<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
if(isset($btn))
{


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>

<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	color: #FF6600;
	font-weight: bold;
	font-size: 24px;
}
.style3 {color: #FF0000; font-weight: bold; font-size: 24px; }
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center" class="hd"><?php include("title.php"); ?></div>
   <?php include("link_admin.php"); ?>
   <h2 align="center">Welcome to Administrator </h2>
   <?php
   /*$qry=mysql_query("select * from street_det where not_work=1 order by dtime desc");
   while($row=mysql_fetch_array($qry))
   {
   if($row['light']!="")
   {
   ?>
   <p align="center" class="style2"><?php echo "Alert! ".$row['light']." Not work, ".$row['street']."-".$row['area']."-".$row['city']." ".$row['dtime']; ?></p>
   <?php
   }
   }
   $qry1=mysql_query("select * from street_det where abnormal=1 order by dtime desc");
   while($row1=mysql_fetch_array($qry1))
   {
   if($row1['light']!="")
   {
   ?>
   <p align="center" class="style3"><?php echo "Abnormal!! ".$row1['light']." Not work, ".$row1['street']."-".$row1['area']."-".$row1['city']." ".$row1['dtime']; ?></p>
   <?php
   }
   }*/
   ?>
   <p align="center">
   <iframe src="alert_show.php" width="800" height="300" style="display:block" frameborder="0"></iframe>
   </p><div align="center"></div>
   <p>&nbsp;</p>
   <p align="center" class="sd"><?php include("title.php"); ?></p>
  
</form>
</body>
</html>
