<?php
	$title=$_POST['title'];
	$content=$_POST['content'];
	session_start();
	$wz_zuozhe=$_SESSION['username'];
	date_default_timezone_set('PRC');
	$time=date('Y-m-d H:i:s');
	$dz_num=0;
	$pl_num=0;
	$redu=0;
	include('conn.php');
	$sql="insert into wenzhang (title,content,time,wz_zuozhe,dz_num,pl_num,redu) values('$title','$content','$time','$wz_zuozhe','$dz_num','$pl_num','$redu')";
	if (mysqli_query($conn,$sql)) {
		echo "发布成功,可以前往我的发布或首页查看";
	}else{
		echo "发布失败";
	}
?>