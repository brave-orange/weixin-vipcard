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


if($name==null || $sex==null || $sid=NULL || $xueyuan=null || $banji==null || $qq=null || $phone==null��|| $stname==null || bumen==null)
{
	 echo "��Ϣ���벻ȫ��3��󽫷���ע��ҳ��";
	header("refresh:3;url = form.html");
	exit;
}
$dst_path = 'bkimage.png';
//����ͼƬ��ʵ��
$dst = imagecreatefromstring(file_get_contents($dst_path));
//��������
$font = '���������.ttf';//����
$white = imagecolorallocate($dst, 0xFF, 0xFF, 0xFF);//������ɫ
$blue = imagecolorallocate($dst, 0x09, 0xc4, 0xc6);//������ɫ
$black = imagecolorallocate($dst, 0xDC, 0x50, 0x00);
imagefttext($dst, 43, 0, 110, 400, $white, $font,$name);//����

$font = '����ȫ��ʫ��.ttf';//���ŵ�����
$ID = "ID:chzumaker".$sid;
imagefttext($dst, 20, 0, 810, 350, $blue, $font,$stname);
imagefttext($dst, 20, 0, 810, 395, $blue, $font,$bumen);
imagefttext($dst, 20, 0, 810, 440, $blue, $font,$sid);
imagefttext($dst, 20, 0, 810, 485, $blue, $font,$xueyuan);
imagefttext($dst, 18, 0, 1100, 770, $black, $font,$ID);

/******************************************************/
//д���ά��
$src_path =  "http://qr.liantu.com/api.php?text=http://brave-orange.cn/weixin/view.php?id=$sid";
$src = imagecreatefromstring(file_get_contents($src_path));
list($src_w, $src_h) = getimagesize($src_path);
imagecopymerge($dst, $src, 1140, 10, 15, 15, $src_w-15, $src_h-15, 60);

header('Content-Type: image/png');
  //imagepng($dst);
  imagejpeg($dst,'./img/'.$sid.'.jpg');
  echo "ע��ɹ������ڼ���...";
 header("refresh:3;url = success.html");
imagedestroy($dst);

//��Ϣд�����ݿ�

$con = mysql_connect("localhost","root","wang");
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


?>

