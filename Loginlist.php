<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	include('conn.php');
	$sql="select * from user where username='$username' and password='$password'";
	$rs=mysqli_query($conn,$sql);	
	$row=mysqli_num_rows($rs);
	if ($row==1) {
		session_start();
		$_SESSION['username']=$username;
		$sql2="select * from user where username='$username'";
		$rs2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($rs2);
		echo $row2['ifAdmin'];
		// echo "登录成功";
	}else{
		echo "登录失败";
	}
?>