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
	  <a class="icon icon-emoji pull-left"></a>
	  <a class="icon icon-refresh pull-right" id="shuaxin"></a>
	  <h1 class="title">微博主页</h1>
	</header>
    <nav class="bar bar-tab">
	  <a class="tab-item external page1" href="?id=1">
	    <span class="icon icon-home"></span>
	    <span class="tab-label">首页</span>
	  </a>
	  <a class="tab-item external page2" href="?id=2">
	    <span class="icon icon-message"></span>
	    <span class="tab-label">发布文章</span>
	  </a>	
	  <a class="tab-item external page3" href="?id=3">
	    <span class="icon icon-card"></span>
	    <span class="tab-label">我的发布</span>
	  </a>	  
	  <a class="tab-item external page4" href="?id=4">
	    <span class="icon icon-me"></span>
	    <span class="tab-label">个人中心</span>
	    <!-- <span class="badge">2</span> -->
	  </a>
	</nav>
	<div class="content">
		<div class="content-padded" id="page1">
		 	<div class="content-block-title">所有微博</div>
		  <?php
		  	include('conn.php');
		  	session_start();
				$username=$_SESSION['username'];
		  	$sql="select * from wenzhang order by redu desc";
		  	$rs=mysqli_query($conn,$sql);
		  	while ($row=mysqli_fetch_array($rs)) {
		  ?>
		  	<div class="card facebook-card dd" id="<?php echo $row['wz_Id'];?>">
			    <div class="card-header no-border">
			      <div class="facebook-avatar"><img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" width="34" height="34"></div>
			      <div class="facebook-name"><?php echo $row['wz_zuozhe'];?></div>
			      <div class="facebook-date"><?php echo $row['time'];?></div>
			    </div>
			    <div class="card-content content-padded">
			    	<?php echo $row['content'];?>
			    </div>
			    <div class="card-footer no-border">
			      <a href="#" class="link">赞<?php echo $row['dz_num'];?></a>
			      <a href="#" class="link">评论<?php echo $row['pl_num'];?></a>
			      <a href="#" class="link">热度<?php echo $row['redu'];?></a>
			    </div>
			  </div>
		  <?php
		  	}
		  ?>
		</div>
		<div class="content-padded" id="page2" style="display:none;">		  
<!-- 		  <header class="bar bar-nav">
		  	<h1 class='title'>表单</h1>
			</header> -->
			<div class="content">
			  <div class="list-block">
			    <ul>
			      <!-- Text inputs -->
			      <li>
			        <div class="item-content">
			          <div class="item-media"><i class="icon icon-form-name"></i></div>
			          <div class="item-inner">
			            <div class="item-title label">标题</div>
			            <div class="item-input">
			              <input type="text" placeholder="请输入文章标题" name="title" id="title">
			            </div>
			          </div>
			        </div>
			      </li>
			      <li class="align-top">
			        <div class="item-content">
			          <div class="item-media"><i class="icon icon-form-comment"></i></div>
			          <div class="item-inner">
			            <div class="item-title label">文章内容</div>
			            <div class="item-input">
			              <textarea placeholder="请输入文章内容" name="content" id="content"></textarea>
			            </div>
			          </div>
			        </div>
			      </li>
			    </ul>
			  </div>
			  <div class="content-block">
			      <div><a href="#" class="button button-big button-fill button-success" id="fb">发布</a></div>
			  </div>
			</div>
		</div>
		<div class="content-padded" id="page3" style="display:none;">
		  <div class="content-block-title">个人发布</div>
		  <?php
		  	include('conn.php');
				$username=$_SESSION['username'];
		  	$sql="select * from wenzhang where wz_zuozhe='$username' order by time desc";
		  	$rs=mysqli_query($conn,$sql);
		  	while ($row=mysqli_fetch_array($rs)) {
		  ?>
		  	<div class="card facebook-card">
			    <div class="card-header no-border">
			      <div class="facebook-avatar"><img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" width="34" height="34"></div>
			      <div class="facebook-name"><?php echo $row['wz_zuozhe'];?><span class="icon icon-remove shanchu" style="margin-left: 130px;font-size: 20px;" id="<?php echo $row['wz_Id'];?>"></span></div>
			      <div class="facebook-date"><?php echo $row['time'];?></div>
			    </div>
			    <div class="card-content content-padded" id="<?php echo $row['time'];?>">
			    	<?php echo $row['content'];?>
			    </div>
			    <div class="card-footer no-border">
			      <a href="#" class="link">赞<?php echo $row['dz_num'];?></a>
			      <a href="#" class="link">评论<?php echo $row['pl_num'];?></a>
			      <a href="#" class="link">热度<?php echo $row['redu'];?></a>
			    </div>
			  </div>
		  <?php
		  	}
		  ?>		  
		</div>
		<div class="content-padded" id="page4" style="display:none;">
		  <div class="content">
		  	<?php
		  		include('conn.php');
					$username=$_SESSION['username'];
					$sql2="select * from user where username='$username'";
					$rs2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_array($rs2);
		  	?>
			  <div class="content-block-title">个人中心</div>
			  <div class="list-block">
			    <ul>
			      <li class="item-content">
			        <div class="item-media"><i class="icon icon-f7"></i></div>
			        <div class="item-inner">
			          <div class="item-title">用户名</div>
			          <div class="item-after"><?php echo $row2['username'];?></div>
			        </div>
			      </li>
			      <li class="item-content">
			        <div class="item-media"><i class="icon icon-f7"></i></div>
			        <div class="item-inner">
			          <div class="item-title">性别</div>
			          <div class="item-after"><?php echo $row2['sex'];?></div>
			        </div>
			      </li>
			      <li class="item-content">
			        <div class="item-media"><i class="icon icon-f7"></i></div>
			        <div class="item-inner">
			          <div class="item-title">生日</div>
			          <div class="item-after"><?php echo $row2['Birth'];?></div>
			        </div>
			      </li>
			      <li class="item-content">
			        <div class="item-media"><i class="icon icon-f7"></i></div>
			        <div class="item-inner">
			          <div class="item-title">身份</div>
			          <?php
			          	if ($row2['ifAdmin']==0) {
			          ?>
			          	<div class="item-after">普通用户</div>
			          <?php
			          	}else{
			          ?>
			          	<div class="item-after">管理员</div>
			          <?php		
			          	}
			          ?>
			          
			        </div>
			      </li>
			      <li class="item-content">
			        <div class="item-media"><i class="icon icon-f7"></i></div>
			        <div class="item-inner">
			          <div class="item-title">密码</div>
			          <div class="item-after"><input type="text" name="mm" id="mm" value="<?php echo $row2['password'];?>"></div>
			        </div>
			      </li>
			    </ul>
			  </div>
			  <div class="content-block-title">只有密码可以修改哦,输入密码即可修改密码</div>
			  <a href="#" class="button button-big button-fill button-success" id="xxmg">修改密码</a>
			  <a href="zhuxiao.php" class="button button-big button-fill button-danger" style="margin-top: 10px;">退出登录</a>
		</div>
        <!-- <div class="content-block">这里是content</div> -->
    </div>
	<script type="text/javascript">
		function getQueryVariable(variable)
		{
		       var query = window.location.search.substring(1);
		       var vars = query.split("&");
		       for (var i=0;i<vars.length;i++) {
		               var pair = vars[i].split("=");
		               if(pair[0] == variable){return pair[1];}
		       }
		       return(false);
		}
		var myid=getQueryVariable("id");
		
		if (myid=='2') {
			$("#page1").hide();
			$("#page2").show();
			$("#page3").hide();
			$("#page4").hide();
		}else if(myid=='1'){
			$("#page1").show();
			$("#page2").hide();
			$("#page3").hide();
			$("#page4").hide();
		}else if(myid=='3'){
			$("#page1").hide();
			$("#page2").hide();
			$("#page3").show();
			$("#page4").hide();
		}else{
			$("#page1").hide();
			$("#page2").hide();
			$("#page3").hide();
			$("#page4").show();
		}
		$('#fb').click(function(){
				if ($("#title").val()=='') {
					alert('标题不能为空');
					return false;
				}
				if ($("#content").val()=='') {
					alert('内容不能为空');
					return false;
				}
			$.post("fabu_list.php",
			    {
			        title:$("#title").val(),
			        content:$("#content").val()
			    },
			    function(data,status){
			    	window.location.reload();
			        alert("数据: \n" + data + "\n状态: " + status);
			    });
		});
		$('.shanchu').click(function(){
			wz_Id=$(this).attr("id");
			// alert(wz_Id);
			var r=confirm("你确定要删除吗？")
			  if (r==true)
			    {
			    	$.post("delete.php",
			    {
			        wz_Id:wz_Id
			    },
			    function(data,status){
			    	window.location.reload();
			        alert("数据: \n" + data + "\n状态: " + status);
			    });
			    }
			  else
			    {
			    window.location.reload();
			    }
		});
		$('#xxmg').click(function(){
			var password=$('#mm').val();
			if (password=='') {
				alert('密码不能为空');
				return false;
			}
			$.post("xgmm.php",
			    {
			        password:password
			    },
			    function(data,status){
			    	window.location.reload();
			      alert("数据: \n" + data + "\n状态: " + status);
			    });
		});
		$('.dd').click(function(){
			var wz_Id=$(this).attr('id');
			// alert(wz_Id);
			window.location.href="user_Main2.php?wz_Id="+wz_Id;
		});
		$('#shuaxin').click(function(){
			window.location.reload();
		});
	</script>
	  <style type="text/css">
  	#mm{
  		text-indent:160px;
  	}
  </style>
    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
  </body>
</html>