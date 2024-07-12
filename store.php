<?php
include("dbconnect.php");
extract($_REQUEST);
$rdate=date("d-m-Y");
$ch1=mktime(date('h')+5,date('i')+30,date('s'));
$rtime=date('h:i:s A',$ch1);

$mq=mysql_query("select max(id) from agds_details");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

$qry=mysql_query("insert into agds_details(id,details,rdate,rtime) values($id,'$data','$rdate','$rtime')");
if($qry)
{
echo "stored";
}
else
{
echo "failed";
}

?>