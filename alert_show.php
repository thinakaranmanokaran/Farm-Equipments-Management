<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {	color: #FF6600;
	font-weight: bold;
	font-size: 24px;
	background-color:#D9D9FF;
}
.style3 {color: #FF0000; font-weight: bold; font-size: 24px;
background-color:#FFFF99; }
-->
</style>
</head>

<body>
<?php
include("dbconnect.php");
   $qry=mysql_query("select * from street_det where not_work=1 order by dtime desc");
   $num=mysql_num_rows($qry);
   if($num>0)
   {
   
   ?> <table width="100%" border="1">
      
	  <?php
	   while($row=mysql_fetch_array($qry))
	   {
		   if($row['light']!="")
		   {
		   ?>
		<tr><td align="center" class="style2"><?php echo "Alert! ".$row['light']." Not work, ".$row['street']."-".$row['area']."-".$row['city']." ".$row['dtime']; ?></td></tr>
		<?php
		   }
	   }
	   ?>
	   </table>
	   <?php
	}
	
   $qry1=mysql_query("select * from street_det where abnormal=1 order by dtime desc");
   $num1=mysql_num_rows($qry1);
   if($num1>0)
   {
   ?> <table width="100%" border="1">
      
	  <?php
   while($row1=mysql_fetch_array($qry1))
   {
   if($row1['light']!="")
   {
   ?><tr>
<td align="center" class="style3"><?php echo "Abnormal!! ".$row1['light']." Not work, ".$row1['street']."-".$row1['area']."-".$row1['city']." ".$row1['dtime']; ?></td></tr>
<?php
   }
   }
    ?>
	   </table>
	   <?php
   }
   
   if($num=="0" && $num1=="0")
   {
   ?><h2 align="center" style="color:#003399">All Lights Running Properly....</h2><?php
   }
   ?>


<?php

$sq1=mysql_query("select * from street_det where alert_st=1");
	$sn1=mysql_num_rows($sq1);
	
	if($sn1>0)
	{
	echo "yes";
	$sr=mysql_fetch_array($sq1);
	mysql_query("update street_det set alert_st=0 where id=".$sr['id']."");
	?>
<embed src="audio/audio2.mp3" autostart="true"></embed><?php
	}

?>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
//   //Redirect with JavaScript
   window.location.href= 'alert_show.php';
}, 10000);
</script>

</body>
</html>
