<?php
	$username=$_POST['username'];
	include('conn.php');
	$sql="delete from user where username='$username'";
	if (mysqli_query($conn,$sql)) {
		echo('删除成功');
	}else{
		echo "删除失败";
	}
?>