<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
$uname=$_SESSION['uname'];
$user=$_SESSION['user'];




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<script language="javascript">
function del()
{
	if(!confirm("Are you sure want to delete?"))
	{
	return false;
	}
	return true;
}
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div class="sd"><!--<a href="index.php">Home</a>-->
    <div align="center"> Server </div>
  </div>
  
  <h3 align="center">Monitoring </h3>
  <table width="100" border="0" align="center">
    <tr>
      <th scope="col"><iframe src="monitor.php" width="1000" height="400"></iframe></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  
  <p align="center">&nbsp;</p>
  <?php include("link_control.php"); ?>
</form>

</body>
</html>
