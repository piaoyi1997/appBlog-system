<?php
	$password=$_POST['password'];
	session_start();
	$username=$_SESSION['username'];
	include('conn.php');
	$sql="update user set password='$password' where username='$username'";
	if (mysqli_query($conn,$sql)) {
		echo('修改成功');
	}else{
		echo "修改失败";
	}
?>