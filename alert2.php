<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
$uname=$_SESSION['uname'];

if($_REQUEST['act']=="ok")
{
mysql_query("update street_det set abnormal=0 where id=$did");
?>
<script language="javascript">
window.location.href="alert2.php";
</script>
<?php
}

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
  <div align="center" class="hd"><?php include("title.php"); ?></div>
  <p>
    <?php include("link_admin.php"); ?>
    
    <?php
	
	$qry=mysql_query("select * from street_det where abnormal=1 order by id");
	$num=mysql_num_rows($qry);
	if($num>0)
	{
	?>
  </p>
  <table width="872" border="1" align="center">
    <tr>
      <th width="60" class="bg1" scope="col">Sno</th>
      <th width="179" class="bg1" scope="col">Street</th>
      <th width="151" class="bg1" scope="col">Light</th>
      <th width="224" class="bg1" scope="col">Date/Time</th>
      <th width="224" class="bg1" scope="col">Staus</th>
    </tr>
    <?php
	  $i=0;
	  while($row=mysql_fetch_array($qry))
	  {
	  $i++;
	  $nw="bgcolor=#CC66FF";
	  $ab="bgcolor=#FFFF33";
	  ?>
    <tr <?php if($row['not_work']=="1") { echo $nw; } else if($row['abnormal']=="1") { echo $ab; } else { echo "class=bg2"; } ?>>
      <th><?php echo $i; ?></th>
      <th><?php echo $row['street']."-".$row['area']."-".$row['city']; ?></th>
      <td><?php echo $row['light']; ?></td>
      <td><?php echo $row['dtime']; ?></td>
      <td><?php
		
		
		echo '<img src="images/abnormal.jpg" width="100" height="100">';
		echo '<a href="alert2.php?act=ok&did='.$row['id'].'">Click to Solve</a>';
		
		
		
		?></td>
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
<p align="center">&nbsp;</p>
 <iframe src="alert.php" width="200" height="100" style="display:block" frameborder="0"></iframe>
</form>

</body>
</html>
