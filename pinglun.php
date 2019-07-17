<?php
	$pl_wz_Id=$_POST['wz_Id'];
	$pl_content=$_POST['pl_content'];
	session_start();
	$pl_username=$_SESSION['username'];
	include('conn.php');
	$sql="insert into pinglun (pl_username,pl_wz_Id,pl_content) values('$pl_username','$pl_wz_Id','$pl_content')";
	if (mysqli_query($conn,$sql)) {
		$sql2="select * from wenzhang where wz_Id='$pl_wz_Id'";
		$rs=mysqli_query($conn,$sql2);
		$row=mysqli_fetch_array($rs);
		$pl_num=$row['pl_num']+1;
		$redu=$row['redu']+1;
		$sql3="update wenzhang set pl_num='$pl_num',redu='$redu' where wz_Id='$pl_wz_Id'";
		if (mysqli_query($conn,$sql3)) {
			echo "评论成功";
		}else{
			echo "评论失败";
		}
		
	}else{
		echo "评论失败";
	}
?>