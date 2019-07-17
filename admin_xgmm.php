<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	include('conn.php');
	$sql="update user set password='$password' where username='$username'";
	if (mysqli_query($conn,$sql)) {
		echo "修改成功";
	}else{
		echo "修改失败";
	}
?>