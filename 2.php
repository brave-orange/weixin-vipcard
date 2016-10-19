<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	
	$password = $_POST["pass"];
	if($password == "maker2016" )
	{
		Session_start();
		$_SESSION["name"]="ok";

		echo "登陆成功！正在加载...";
		header("refresh:3;url = form.html");
	}
	else
	{
		echo "验证码错误，3秒后返回验证页面";
		header("refresh:3;url = pass.html");
	}

?>
</body>
</html>