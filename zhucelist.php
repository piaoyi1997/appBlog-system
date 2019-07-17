<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sex=$_POST['sex'];
	$Birth=$_POST['Birth'];
	$ifAdmin=0;	
	include('conn.php');
	$sql="insert into user (username,password,sex,Birth,ifAdmin) values('$username','$password','$sex','$Birth','$ifAdmin')";
	if (mysqli_query($conn,$sql)) {
		echo "注册成功";
	}else{
		echo "注册失败";
	}
?>