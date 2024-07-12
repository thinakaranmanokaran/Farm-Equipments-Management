<?php
session_start();
include("dbconnect.php");
extract($_POST);
$msg="";
if(isset($btn))
{
$qry=mysql_query("select * from admin where username='$uname' && password='$pass'");
$num=mysql_num_rows($qry);
	if($num==1)
	{
	$_SESSION['adminiot']=$uname;
	header("location:admin.php");
	}
	else
	{
	$msg="Invalid User!";
	}

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
  <div align="center" class="hd"><?php include("title.php"); ?></div>
  <div class="sd"><!--<a href="index.php">Home</a>-->
    <div align="center"><a href="index.php">Home</a><a href="login.php">Login</a> </div>
  </div>
  <p>&nbsp;</p>
  <table width="75%" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <th width="63%" valign="top" scope="col"><img src="images/6622-4.jpg" width="501" height="204" /></th>
      <th width="37%" valign="top" scope="col"><table width="380" height="299" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <th class="bg1" scope="col">Admin Login</th>
        </tr>
        <tr>
          <td align="center" class="bg2"><input name="uname" type="text" class="inp" placeholder="Username" /></td>
        </tr>
        <tr>
          <td align="center" class="bg2"><input name="pass" type="password" class="inp" placeholder="Password" /></td>
        </tr>
        <tr>
          <td align="center" class="bg2"><input name="btn" type="submit" class="inp" value="Login" /></td>
        </tr>
        <tr>
          <td align="center" class="bg2"><span class="style1"><?php echo $msg; ?></span></td>
        </tr>
      </table></th>
    </tr>
  </table>
  <p align="center"><a href="regform.php"></a></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
