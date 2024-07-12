<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$msg="";
$uname=$_SESSION['uname'];
$month=date("m");
$year=date("Y");

$q5=mysql_query("select * from street_login where username='admin'");
$r5=mysql_fetch_array($q5);

if($act=="off")
{
mysql_query("update street_det set status=0 where id=$lid");
?>
<script language="javascript">
window.location.href="monitor2.php";
</script>
<?php
}
if($act=="on")
{
	////////////////

$q1=mysql_query("select * from street_usage where month=$month && year=$year");
	$n1=mysql_num_rows($q1);
	if($n1==0)
	{
		$q2=mysql_query("select * from street_det");
		while($r2=mysql_fetch_array($q2))
		{
	$mq=mysql_query("select max(id) from street_usage");
	$mr=mysql_fetch_array($mq);
	$id=$mr['max(id)']+1;
	$light=$r2['light'];
	mysql_query("insert into street_usage(id,light,power_usage,month,year) values($id,'$light','0','$month','$year')");
	
		}
		$q22=mysql_query("select * from street_det where id=$lid");
		$r22=mysql_fetch_array($q22);
		$level2=$r22['level'];
	mysql_query("update street_det set level=$level2,status=1 where id=".$lid."");
	}
	else
	{
		$q22=mysql_query("select * from street_det where id=$lid");
		$r22=mysql_fetch_array($q22);
		$level2=$r22['level'];
	mysql_query("update street_det set level=$level2,status=1 where id=".$lid."");
	}

/////////////

?>
<script language="javascript">
window.location.href="monitor2.php";
</script>
<?php
}
if($act=="not")
{
mysql_query("update street_det set status=0,not_work=1 where id=$lid");
?>
<script language="javascript">
window.location.href="monitor2.php";
</script>
<?php
}
if($act=="abnormal")
{
mysql_query("update street_det set status=0,abnormal=1 where id=$lid");
?>
<script language="javascript">
window.location.href="monitor2.php";
</script>
<?php
}
/////////#############################################3///////
if($r5['light_mode']=="1")
{
	/*if($month>=3 && $month<=8)
	{
	$season="2";
	}
	else
	{
	$season="1";
	}*/
$q4=mysql_query("select * from street_det");
$n4=mysql_num_rows($q4);
$h=rand(0,$n4+50);
$g=rand(0,$n4+100);
	$sq1=mysql_query("select * from street_det where id=$g");
	$sn1=@mysql_num_rows($s1);
	if($sn1>0)
	{
//	?/><embed src="audio/audio1.mp3" autostart="true"></embed><?php
	}
	$sq2=mysql_query("select * from street_det where id=$h");
	$sn2=@mysql_num_rows($s2);
	if($sn2>0)
	{
//	?/><embed src="audio/audio2.mp3" autostart="true"></embed><?php
	}
while($r4=mysql_fetch_array($q4))
{
	

mysql_query("update street_det set abnormal=1,alert_st=1 where id=$g && not_work=0");
mysql_query("update street_det set not_work=1,alert_st=1 where id=$h && abnormal=0");

$lig=$r4['light'];
	$q44=mysql_query("select * from street_det where light='$lig'");
	$r44=mysql_fetch_array($q44);
		if($r44['not_work']=="0" && $r44['abnormal']=="0")
		{
				if($r44['level']=="3")
				{
mysql_query("update street_usage set seconds=seconds+30 where light='$lig' && month='$month' && year='$year'");
				}
				else if($r44['level']=="2")
				{
mysql_query("update street_usage set seconds=seconds+20 where light='$lig' && month='$month' && year='$year'");
				}
				else if($r44['level']=="1")
				{
mysql_query("update street_usage set seconds=seconds+10 where light='$lig' && month='$month' && year='$year'");
				}
		}
}//while
}
else
{
	
	$q44=mysql_query("select * from street_det");
	while($r44=mysql_fetch_array($q44))
	{
		if($r44['not_work']=="0" && $r44['abnormal']=="0")
		{
		$lig=$r44['light'];
				if($r44['level']=="3" && $r44['status']=="1")
				{
mysql_query("update street_usage set seconds=seconds+30 where light='$lig' && month='$month' && year='$year'");
				}
				else if($r44['level']=="2" && $r44['status']=="1")
				{
mysql_query("update street_usage set seconds=seconds+20 where light='$lig' && month='$month' && year='$year'");
				}
				else if($r44['level']=="1" && $r44['status']=="1")
				{
mysql_query("update street_usage set seconds=seconds+10 where light='$lig' && month='$month' && year='$year'");
				}
		}
	}
}


///////////////unit///////////////////
$q41=mysql_query("select * from street_usage where month=$month && year=$year");
while($r41=mysql_fetch_array($q41))
{
	if($r41['seconds']>=60)
	{
		$pu=$r41['seconds']/60;
		//echo $u." ";
		/*if($season=="1")
		{
		$pu=$u*1;
		}
		else
		{
		$pu=$u*0.8;
		}*/
	}
	else
	{
	$pu=0;
	}
mysql_query("update street_usage set power_usage=$pu where id=".$r41['id']."");
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
<div align="center">
    <?php
	
	$qry=mysql_query("select * from street_det order by id");
	$num=mysql_num_rows($qry);
	if($num>0)
	{
	?>
    <table width="100%" border="1">
      <tr>
        <th width="142" class="bg1" scope="col">Sno</th>
        <th width="269" class="bg1" scope="col">Light</th>
        <th width="625" class="bg1" scope="col">Staus</th>
      </tr>
      <?php
	  $i=0;
	  while($row=mysql_fetch_array($qry))
	  {
	  $i++;
	  //$nw="bgcolor=#CC66FF";
	 // $ab="bgcolor=#FFFF33";
	  
			 if($row['not_work']=="0" && $row['abnormal']=="0" && $row['status']=="1")
			 {
			  /*if($row['level']=="2")
				{
				$lep="Medium Power";
				$cla="#FF9933";
				}
				else if($row['level']=="1")
				{
				$lep="Low Power";
				$cla="#FFB0B0";
				}
				else
				{
				$lep="High Power";
				$cla="#FF1515";
				}*/
			}	
			else
			{
			$cla="";
			$lep="";
			}
			
			//if($row['not_work']=="1") { echo $nw; } else if($row['abnormal']=="1") { echo $ab; } else { echo "class=bg2"; }
	  ?>
      <tr <?php echo "class=bg2"; ?>>
        <th align="left"><?php echo $i; ?></th>
        <td><?php echo $row['light']; ?></td>
        <td><?php
		/*
		if($row['abnormal']=="1")
		{
		//echo '<img src="images/abnormal.jpg" width="100" height="100">';
		//echo "Abnormal";
		}
		else if($row['not_work']=="1")
		{
		//echo '<img src="images/LOFF.png" width="100" height="100">';
		//echo "Not Work";
		}
		else 
		{*/
			if($row['status']=="1")
			{
			//echo '<img src="images/LON.jpg" width="100" height="100">';
			echo "Light ON |";
			echo ' <a href="monitor2.php?act=off&lid='.$row['id'].'">OFF</a>';
			}
			else 
			{
			//echo '<img src="images/LOFF.png" width="100" height="100">';
			echo "Light OFF |";
			echo ' <a href="monitor2.php?act=on&lid='.$row['id'].'">ON</a>';
			}
			
		echo ' <a href="monitor2.php?act=not&lid='.$row['id'].'"><img src="images/nn.jpg" width="40" height="40" title="Not Working"></a>';	
		echo ' <a href="monitor2.php?act=abnormal&lid='.$row['id'].'"><img src="images/abnor.jpg" width="40" height="40" title="Abnormal"></a>';	
		//}
		
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
</div>


<?php

//if($r5['light_mode']=="1")
//{
?>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
//   //Redirect with JavaScript
   window.location.href= 'monitor2.php';
}, 10000);
</script>
<?php
//}
?>
</body>
</html>
