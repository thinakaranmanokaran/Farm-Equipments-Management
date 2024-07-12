<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
if(isset($btn))
{
	for($i=1;$i<=$num_light;$i++)
	{
$mq=mysql_query("select max(id) from street_det");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;
$light="L".$id;
$qry=mysql_query("insert into street_det(id,city,area,street,light) values($id,'$city','$area','$street','$light')");
	}
	
	?>
	<script language="javascript">
	alert("Stored Successfully");
	window.location.href="view_light.php";
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
  <div align="center" class="hd"><?php include("title.php"); ?></div>
   <?php include("link_admin.php"); ?>
  <p>&nbsp;</p>
  <div align="center">
    <table width="536" height="299" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <th colspan="2" class="bg1" scope="col">Light Information </th>
      </tr>
      <tr>
        <td width="256" align="left" class="bg2">City / District </td>
        <td width="260" align="left" class="bg2"><input name="city" type="text" /></td>
      </tr>
      <tr>
        <td align="left" class="bg2">Area</td>
        <td align="left" class="bg2"><input name="area" type="text" /></td>
      </tr>
      <tr>
        <td align="left" class="bg2">Street Name </td>
        <td align="left" class="bg2"><input type="text" name="street" /></td>
      </tr>
      <tr>
        <td align="left" class="bg2">Number of Lights </td>
        <td align="left" class="bg2"><input type="text" name="num_light" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="bg2"><input name="btn" type="submit" class="inp" value="Submit" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="bg2"><span class="style1"><?php echo $msg; ?></span></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
