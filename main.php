<?php
$name = $_POST['name'];
$sex = $_POST['sex'];
$sid = $_POST['SID'];
$xueyuan = $_POST['xueyuan'];
$banji = $_POST['banji'];
$qq = $_POST['QQ'];
$phone = $_POST['phone'];
$stname = $_POST['stNAME'];
$bumen = $_POST['bumen'];


if($name==null || $sex==null || $sid==NULL || $xueyuan==null || $banji==null || $qq==null || $phone==null　|| $stname==null || bumen==null)
{
	 echo "信息输入不全，3秒后将返回注册页面";
	header("refresh:3;url = form.html");
	exit;
}
$dst_path = 'bkimage.png';
//创建图片的实例
$dst = imagecreatefromstring(file_get_contents($dst_path));
//打上文字
$font = '迷你简汉真广标.ttf';//字体
$white = imagecolorallocate($dst, 0xFF, 0xFF, 0xFF);//字体颜色
$blue = imagecolorallocate($dst, 0x09, 0xc4, 0xc6);//字体颜色
$black = imagecolorallocate($dst, 0xDC, 0x50, 0x00);
imagefttext($dst, 43, 0, 110, 400, $white, $font,$name);//姓名

$font = '汉仪全唐诗简.ttf';//部门等字体
$ID = "ID:chzumaker".$sid;
imagefttext($dst, 20, 0, 810, 350, $blue, $font,$stname);
imagefttext($dst, 20, 0, 810, 395, $blue, $font,$bumen);
imagefttext($dst, 20, 0, 810, 440, $blue, $font,$sid);
imagefttext($dst, 20, 0, 810, 485, $blue, $font,$xueyuan);
imagefttext($dst, 18, 0, 1100, 770, $black, $font,$ID);

/******************************************************/
//写入二维码
$src_path =  "http://qr.liantu.com/api.php?text=http://brave-orange.cn/weixin/view.php?id=$sid";
$src = imagecreatefromstring(file_get_contents($src_path));
list($src_w, $src_h) = getimagesize($src_path);
imagecopymerge($dst, $src, 1140, 10, 15, 15, $src_w-15, $src_h-15, 60);

header('Content-Type: image/png');
  //imagepng($dst);
  imagejpeg($dst,'./img/'.$sid.'.jpg');

imagedestroy($dst);

//信息写入数据库

$con = mysql_connect("localhost","root","****");
mysql_query("set names 'utf8'");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

 mysql_select_db("weixin", $con);
 $sql = "insert into users value('$sid','$name','$sex','$xueyuan','$phone','$banji','$qq','$stname','$bumen')";
// some code
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($con);
  echo "注册成功！正在加载...";
 header("refresh:3;url = success.html");

?>

