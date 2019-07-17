<?php
	$wz_Id=$_POST['wz_Id'];
	session_start();
	$dz_username=$_SESSION['username'];
	include('conn.php');
	$sql="delete from dianzan where dz_username='$dz_username' and wz_Id='$wz_Id'";
	if (mysqli_query($conn,$sql)) {
		$sql2="select * from wenzhang where wz_Id='$wz_Id'";
		$rs=mysqli_query($conn,$sql2);
		$row=mysqli_fetch_array($rs);
		$dz_num=$row['dz_num']-1;
		$redu=$row['redu']-1;
		$sql3="update wenzhang set dz_num='$dz_num',redu='$redu' where wz_Id='$wz_Id'";
		if (mysqli_query($conn,$sql3)) {
			echo "取消点赞成功";
		}else{
			echo "取消点赞失败";
		}
		
	}else{
		echo "取消点赞失败";
	}
?>