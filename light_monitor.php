<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";


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
  <?php include("link_home.php"); ?>
  <h2 align="center">Monitoring</h2>
  <table width="100" border="0" align="center">
    <tr>
      <th scope="col"><iframe src="monitor.php" width="1000" height="400"></iframe></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
