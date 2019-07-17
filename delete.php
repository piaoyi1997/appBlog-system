<?php
	$wz_Id=$_POST['wz_Id'];
	include('conn.php');
	$sql="delete from wenzhang where wz_Id='$wz_Id'";
	if (mysqli_query($conn,$sql)) {
		echo "删除成功";
	}else{
		echo "删除失败";
	}
?>