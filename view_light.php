<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
if($_REQUEST['act']=="del")
{
mysql_query("delete from street_det where id=$did");
header("location:view_light.php");
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
   <h3 align="center">Street Light Information </h3>
  <div align="center">
    <p>
      <select name="city">
	  <option value="">-City-</option>
	  <?php
	  $cq1=mysql_query("select distinct(city) from street_det");
	  while($cr1=mysql_fetch_array($cq1))
	  {
	  ?>
	  <option <?php if($cr1['city']==$city) echo "selected"; ?>><?php echo $cr1['city']; ?></option>
	  <?php
	  }
	  ?>
      </select>
      <select name="area">
	  <option value="">-Area-</option>
	  <?php
	  $cq2=mysql_query("select distinct(area) from street_det");
	  while($cr2=mysql_fetch_array($cq2))
	  {
	  ?>
	  <option <?php if($cr2['area']==$area) echo "selected"; ?>><?php echo $cr2['area']; ?></option>
	  <?php
	  }
	  ?>
      </select>
      <select name="street">
	  <option value="">-Street-</option>
	  <?php
	  $cq3=mysql_query("select distinct(street) from street_det");
	  while($cr3=mysql_fetch_array($cq3))
	  {
	  ?>
	  <option <?php if($cr3['street']==$street) echo "selected"; ?>><?php echo $cr3['street']; ?></option>
	  <?php
	  }
	  ?>
      </select>
      <input type="submit" name="btn" value="Submit">
    </p>
	<?php
	if($city!="" || $area!="" || $street!="")
	{
		if($city!="")
		{
			if($q=="")
			{
			$q=" where city='$city'"; 
			}
			else
			{
			$q.=" && city='$city'"; 
			}
		}
		if($area!="")
		{
			if($q=="")
			{
			$q=" where area='$area'"; 
			}
			else
			{
			$q.=" && area='$area'"; 
			}
		}
		if($street!="")
		{
			if($q=="")
			{
			$q=" where street='$street'"; 
			}
			else
			{
			$q.=" && street='$street'"; 
			}
		}
	$qry=mysql_query("select * from street_det $q order by id");
	}
	else
	{
	$qry=mysql_query("select * from street_det order by id");
	}
	$num=mysql_num_rows($qry);
	if($num>0)
	{
	?>
    <table width="890" border="1">
      <tr>
        <th width="70" class="bg1" scope="col">Sno</th>
        <th width="225" class="bg1" scope="col">City</th>
        <th width="166" class="bg1" scope="col">Area</th>
        <th width="209" class="bg1" scope="col">Street</th>
        <th width="186" class="bg1" scope="col">Light</th>
        <th width="186" class="bg1" scope="col">Action</th>
      </tr>
	  <?php
	  $i=0;
	  while($row=mysql_fetch_array($qry))
	  {
	  $i++;
	  ?>
      <tr>
        <th class="bg2" scope="row"><?php echo $i; ?></th>
        <th class="bg2" scope="row"><?php echo $row['city']; ?></th>
        <td class="bg2"><?php echo $row['area']; ?></td>
        <td class="bg2"><?php echo $row['street']; ?></td>
        <td class="bg2"><?php echo $row['light']; ?></td>
        <td class="bg2"><a href="view_light.php?act=del&did=<?php echo $row['id']; ?>">Delete</a></td>
      </tr>
	  <?php
	  }
	  ?>
    </table>
	
	<?php
	}
	else
	{
	echo "Empty..";
	}
	?>
	 
    <p><a href="add_light.php">Add Light Information </a></p>
    <p>&nbsp;</p>
  </div>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
   <iframe src="alert.php" width="200" height="100" style="display:block" frameborder="0"></iframe>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
