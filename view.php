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
	 echo "<h3>������ ".$row['name']."</h3>";
	 echo "<br>";
	 echo "<h3>�Ա�".$row['sex']."</h3>";
	 echo "<br>";
	 echo "<h3>ѧ�ţ�".$row['sid']."</h3>";
	 echo "<br>";
	 echo "<h3>QQ��".$row['QQ']."</h3>";
	 echo "<br>";
	 echo "<h3>�ֻ���".$row['phone']."</h3>";
	 echo "<br>";
	 echo "<h3>ѧԺ��".$row['xueyuan']."</h3>";
	 echo "<br>";
	 echo "<h3>���ţ�".$row['STname']."</h3>";
	 echo "<br>";
	 echo "<h3>���ţ�".$row['bumen']."</h3>";
	 echo "<br>";
	 
?>