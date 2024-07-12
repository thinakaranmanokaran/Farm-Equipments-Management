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
   <?php include("link_admin.php"); ?>
   <h3 align="center">Performance </h3>
   <p align="center">
     <select name="light">
	 <option value="">-All Light-</option>
	 <?php
	 $qy1=mysql_query("select distinct(light) from street_det");
	while($ry1=mysql_fetch_array($qy1))
	{
	 ?>
	 <option <?php if($light==$ry1['light']) echo "selected"; ?>><?php echo $ry1['light']; ?></option>
	 <?php
	 }
	 ?>
     </select>
     <select name="year">
	 <option value="">-All Year-</option>
	 <?php
	 $qy=mysql_query("select distinct(year) from street_usage");
	while($ry=mysql_fetch_array($qy))
	{
	 ?>
	 <option <?php if($year==$ry['year']) echo "selected"; ?>><?php echo $ry['year']; ?></option>
	 <?php
	 }
	 ?>
     </select>
     <input type="submit" name="btn" value="Submit" />
   </p>
   <?php
   if(isset($btn))
   {
   		if($light!="")
		{
		$q=" && light='$light'";
		}
		else
		{
		$q="";
		}
   		if($year!="")
		{
			if($q=="")
			{
			$q=" && year='$year'";
			}
			else
			{
			$q.=" && year='$year'";
			}
		}
   $mon=array(1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",5=>"May",6=>"Jun",7=>"Jul",8=>"Aug",9=>"Sep",10=>"Oct",11=>"Nov",12=>"Dec");
   		for($i=1;$i<=12;$i++)
		{
   			$q41=mysql_query("select sum(power_usage),month from street_usage where  month='$i' $q group by month");
			$r41=mysql_fetch_array($q41);
		
		$uni=ceil($r41['sum(power_usage)']);
			
			if($uni=="0")
			{
			$uni=0.0;
			}
		$mo=$mon[$i];
		
		$values[$mo]=$uni;
		
		
		}
   ?>
   <table width="100" border="0" align="center">
     <tr>
       <th scope="col"></th>
     </tr>
     <tr>
       <th scope="row"><?php
	   //echo "<h2 align='center'></h2>";
echo "<br><br>";
# ------- The graph values in the form of associative array
	/*$values=array(
		"Airline" => $a1,
		"Railway" => $a2,
		"Hotel" => $a3,
		"Hospital" => $a4,
		"Tour" => $a5,

	);*/

 
	$img_width=750;
	$img_height=600; 
	$margins=20;

 
	# ---- Find the size of graph by substracting the size of borders
	$graph_width=$img_width - $margins * 2;
	$graph_height=$img_height - $margins * 2; 
	$img=imagecreate($img_width,$img_height);

 
	$bar_width=20;
	$total_bars=count($values);
	$gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);

 
	# -------  Define Colors ----------------
	$bar_color=imagecolorallocate($img,10,80,15);
	$background_color=imagecolorallocate($img,180,180,180);
	$border_color=imagecolorallocate($img,200,200,200);
	$line_color=imagecolorallocate($img,220,220,220);
 
	# ------ Create the border around the graph ------

	imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
	imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);

 
	# ------- Max value is required to adjust the scale	-------
	$max_value=max($values);
	$ratio= $graph_height/$max_value;

 
	# -------- Create scale and draw horizontal lines  --------
	$horizontal_lines=20;
	$horizontal_gap=$graph_height/$horizontal_lines;

	for($i=1;$i<=$horizontal_lines;$i++){
		$y=$img_height - $margins - $horizontal_gap * $i ;
		imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
		$v=($horizontal_gap * $i /$ratio);
		imagestring($img,2,5,$y-5,$v,$bar_color);

	}
 
 
	# ----------- Draw the bars here ------
	
	for($i=0;$i< $total_bars; $i++){ 
		# ------ Extract key and value pair from the current pointer position
		list($key,$value)=each($values); 
		$x1= $margins + $gap + $i * ($gap+$bar_width) ;
		$x2= $x1 + $bar_width; 
		$y1=$margins +$graph_height- intval($value * $ratio) ;
		$y2=$img_height-$margins;
		imagestring($img,2,$x1+3,$y1-10,$value,$bar_color);
		imagestring($img,3,$x1+3,$img_height-15,$key,$bar_color);		
		imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
	}
	//header("Content-type:image/png");
	imagepng($img,"chart/img1.png");

		
echo '<img src="chart/img1.png">';	  
////////////////////////////////////////////////////////////////////////////////
echo "<br>";
foreach($values as $v1=>$k1)
{
echo '<span class="txt5">'.$v1." => ".$k1." units</span><br>";
}
	   ?></th>
     </tr>
   </table>
   <?php
   }
   ?>
   <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
   <iframe src="alert.php" width="200" height="100" style="display:block" frameborder="0"></iframe>
  <p align="center" class="sd"><?php include("title.php"); ?></p>
</form>
</body>
</html>
