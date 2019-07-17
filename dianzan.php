<?php
	$wz_Id=$_POST['wz_Id'];
	session_start();
	$dz_username=$_SESSION['username'];
	include('conn.php');
	$sql="insert into dianzan (dz_username,wz_Id) values('$dz_username','$wz_Id')";
	if (mysqli_query($conn,$sql)) {
		$sql2="select * from wenzhang where wz_Id='$wz_Id'";
		$rs=mysqli_query($conn,$sql2);
		$row=mysqli_fetch_array($rs);
		$dz_num=$row['dz_num']+1;
		$redu=$row['redu']+1;
		$sql3="update wenzhang set dz_num='$dz_num',redu='$redu' where wz_Id='$wz_Id'";
		if (mysqli_query($conn,$sql3)) {
			echo "点赞成功";
		}else{
			echo "点赞失败";
		}
		
	}else{
		echo "点赞失败";
	}
?>