<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户主页</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  </head>
  <body>
  	<header class="bar bar-nav">
	  <a class="icon icon-left pull-left" href="admin_Main.php?id=1">返回</a>
	  <h1 class="title">微博详情</h1>
	</header>
  <div class="content">
  	<div class="content-block-title" style="">微博详情</div>
		  <?php
		  	include('conn.php');
			$wz_Id=$_GET['wz_Id'];
			session_start();
			$username=$_SESSION['username'];
		  	$sql="select * from wenzhang where wz_Id='$wz_Id'";
		  	$rs=mysqli_query($conn,$sql);
		  	while ($row=mysqli_fetch_array($rs)) {
		  ?>
		  	<div class="card facebook-card">
			    <div class="card-header no-border">
			      <div class="facebook-avatar"><img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" width="34" height="34"></div>
			      <div class="facebook-name"><?php echo $row['wz_zuozhe'];?></div>
			      <div class="facebook-date"><?php echo $row['time'];?></div>
			    </div>
			    <div class="card-content content-padded">
			    	<?php echo $row['content'];?>
			    </div>
			    <?php
			    	$sql2="select * from dianzan where dz_username='$username' and wz_Id='$wz_Id'";
			    	$rs2=mysqli_query($conn,$sql2);
			    	$ifDianzan=mysqli_num_rows($rs2);
			    ?>
			    <div class="card-footer no-border">
			    <?php
			    	if ($ifDianzan==1) {
			    ?>
			    		<a href="#" class="qx">已点赞<?php echo $row['dz_num'];?></a>
			    <?php		# code...
			    	}else{
			    ?>
			    		<a href="#" class="dz">赞<?php echo $row['dz_num'];?></a>
			    <?php		
			    	}
			    ?>				      
			      <a href="#" class="pl">评论<?php echo $row['pl_num'];?></a>
			      <a href="#" class="link">热度<?php echo $row['redu'];?></a>
			    </div>
			</div>
		  <?php
		  	}
		  	$sql3="select * from pinglun where pl_wz_Id='$wz_Id'";
		  	$rs3=mysqli_query($conn,$sql3);
		  ?>
			  <div class="list-block">
			    <ul>
			      <!-- Text inputs -->
			      <li>
			        <div class="item-content">
			          <div class="item-media"><i class="icon icon-form-name"></i></div>
			          <div class="item-inner">
			            <div class="item-title label">评论区</div>
			            <div class="item-input">
			              <input type="text" placeholder="可以填写你的评论" id="pl_content" name="pl_content">
			            </div>
			          </div>
			        </div>
			      </li>
			    </ul>
			   </div>
			   <a href="#" class="button button-big button-fill button-danger" id="pl" style="margin-top: -25px;">评论</a>
			   <div class="content-block-title">评论展示区</div>
				  <div class="list-block">
				    <ul>
				    	<?php
				    		while ($row3=mysqli_fetch_array($rs3)) {				    	
				    	?>
				    	  <li class="item-content">
					        <div class="item-media"><i class="icon icon-f7"></i></div>
					        <div class="item-inner">
					          <div class="item-title"><?php echo $row3['pl_username'];?></div>
					          <div class="item-after"><?php echo $row3['pl_content'];?></div>
					        </div>
					      </li>
				    	<?php
				    		}
				    	?>				      
				    </ul>
				  </div>
			</div>	  			      
	<script type="text/javascript">
		$('.dz').click(function(){
			var wz_Id=<?php echo $_GET['wz_Id'];?>;
			$.post("dianzan.php",
			    {
			        wz_Id:wz_Id
			    },
			    function(data,status){
			    	window.location.reload();
			        alert("数据: \n" + data + "\n状态: " + status);
			});
		});
		$('.qx').click(function(){
			var wz_Id=<?php echo $_GET['wz_Id'];?>;
			$.post("qx_dianzan.php",
			    {
			        wz_Id:wz_Id
			    },
			    function(data,status){
			    	window.location.reload();
			        alert("数据: \n" + data + "\n状态: " + status);
			});
		});
		$('#pl').click(function(){
			var wz_Id=<?php echo $_GET['wz_Id'];?>;
			if ($('#pl_content').val()=='') {
				alert('评论不能为空哦');
				return false;
			}
			$.post("pinglun.php",
			    {
			        wz_Id:wz_Id,
			        pl_content:$('#pl_content').val()
			    },
			    function(data,status){
			    	window.location.reload();
			        alert("数据: \n" + data + "\n状态: " + status);
			});
		});
	</script>
    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
  </body>
</html>