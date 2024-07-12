<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
//$dd=date("d-m-Y, h:i:s");
//echo strtotime($dd);

//1548485514 
//1548485490 
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
  <div align="center" class="hd"><?php include("title.php"); ?></div>
  <?php include("link_home.php"); ?>
  <p align="center">&nbsp;</p>
  <div align="center">
  
    <table width="69%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFCCCC">
      <tr>
        <td align="left" valign="top" scope="col"><img src="images/500_F.jpg" width="544" height="409" /></td>
        <td width="30%" align="center" valign="top" scope="col"><p><img src="images/eb.jpg" width="206" height="245" /></p>
        <p><img src="images/eb2.jpg" width="211" height="152" /></p></td>
      </tr>
      <tr>
        <th colspan="2" align="center" valign="top" class="bg2" scope="col"><marquee direction="left"><a href="mess.php"></a></marquee></th>
      </tr>
      <tr>
        <th colspan="2" align="center" valign="top" class="bg2" scope="col"><a href="light_monitor.php">Street Light </a></th>
      </tr>
    </table>
  </div>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
