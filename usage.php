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
  <div align="center" class="hd"><?php include("title.php"); ?></div>
   <?php include("link_admin.php"); ?>
   <h3 align="center">Power Usage </h3>
   <div align="center">
    <p>
      <select name="month">
	  <option value="0">-Month-</option>
	  <?php
	  $dq=mysql_query("select distinct(month) from street_usage order by month");
	  while($dr=mysql_fetch_array($dq))
	  {
	  ?>
	  <option <?php if($month==$dr['month']) echo "selected"; ?>><?php echo $dr['month']; ?></option>
	  <?php
	  }
	  ?>
      </select>
      <select name="year">
	  <option value="0">-Year-</option>
	   <?php
	  $dq1=mysql_query("select distinct(year) from street_usage order by year desc");
	  while($dr1=mysql_fetch_array($dq1))
	  {
	  ?>
	  <option <?php if($year==$dr1['year']) echo "selected"; ?>><?php echo $dr1['year']; ?></option>
	  <?php
	  }
	  ?>
      </select>
      <input type="submit" name="btn" value="Submit" />
    </p>
	<?php
	if(isset($btn))
	{
	$qry=mysql_query("select * from street_usage where month='$month' && year='$year'");
	$num=mysql_num_rows($qry);
	if($num>0)
	{
	?>
	<table width="698" border="1">
      <tr>
        <th width="70" class="bg1" scope="col">Sno</th>
        <th width="225" class="bg1" scope="col">Light</th>
        <th width="166" class="bg1" scope="col">Street</th>
        <th width="209" class="bg1" scope="col">Usage</th>
      </tr>
      <?php
	  $i=0;
	  while($row=mysql_fetch_array($qry))
	  {
	  $i++;
	  $qry1=mysql_query("select * from street_det where light='".$row['light']."'");
	  $row1=mysql_fetch_array($qry1);
	  ?>
      <tr>
        <th class="bg2" scope="row"><?php echo $i; ?></th>
        <th class="bg2" scope="row"><?php echo $row['light']; ?></th>
        <td class="bg2"><?php echo $row1['street']."-".$row1['area']."-".$row1['city']; ?></td>
        <td class="bg2"><?php echo $row['power_usage']; ?></td>
      </tr>
      <?php
	  }
	  ?>
    </table>
	<?php
	}
	}
	?>
	
  </div>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
   <iframe src="alert.php" width="200" height="100" style="display:block" frameborder="0"></iframe>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
