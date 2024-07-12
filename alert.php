<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
include("dbconnect.php");
//echo "select * from street_det where alert_st=1";
$sq1=mysql_query("select * from street_det where alert_st=1");
	$sn1=mysql_num_rows($sq1);
	//echo $sn1;
	if($sn1>0)
	{
	//echo "yes";
	$sr=mysql_fetch_array($sq1);
	mysql_query("update street_det set alert_st=0 where id=".$sr['id']."");
	?><embed src="audio/audio2.mp3" autostart="true"></embed><?php
	}

?>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
//   //Redirect with JavaScript
   window.location.href= 'alert.php';
}, 10000);
</script>

</body>
</html>
