<?php
	$id = $_GET['id'];
	$con = mysql_connect("localhost","root","wang");
	mysql_query("set names 'gb2312'");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	 mysql_select_db("weixin", $con);
	 $sql = "select * from users where sid = '$id'";
	 $res = mysql_query($sql,$con);
	 $row = mysql_fetch_array($res);
	// echo <img src="./img/".sid.".jpg">;
	 echo "<br>";
	 echo "<h3>姓名： ".$row['name']."</h3>";
	 echo "<br>";
	 echo "<h3>性别：".$row['sex']."</h3>";
	 echo "<br>";
	 echo "<h3>学号：".$row['sid']."</h3>";
	 echo "<br>";
	 echo "<h3>QQ：".$row['QQ']."</h3>";
	 echo "<br>";
	 echo "<h3>手机：".$row['phone']."</h3>";
	 echo "<br>";
	 echo "<h3>学院：".$row['xueyuan']."</h3>";
	 echo "<br>";
	 echo "<h3>社团：".$row['STname']."</h3>";
	 echo "<br>";
	 echo "<h3>部门：".$row['bumen']."</h3>";
	 echo "<br>";
	 
?>