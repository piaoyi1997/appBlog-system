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
	  <a class="icon icon-left pull-left" href="admin_Main.php?id=2">返回</a>
	  <h1 class="title">用户详情</h1>
	</header>
  	<div class="content">
  		<?php
  			$username=$_GET['username'];
  			include('conn.php');
  			$sql="select * from user where username='$username'";
  			$rs=mysqli_query($conn,$sql);
  			$row=mysqli_fetch_array($rs);
  		?>
		  <div class="list-block">
		    <ul>
		      <!-- Text inputs -->
		      <li>
		        <div class="item-content">
		          <div class="item-media"><i class="icon icon-form-name"></i></div>
		          <div class="item-inner">
		            <div class="item-title label">姓名</div>
		            <div class="item-input">
		              <input type="text" placeholder="" disabled value="<?php echo $username;?>">
		            </div>
		          </div>
		        </div>
		      </li>
		      <li>
		        <div class="item-content">
		          <div class="item-media"><i class="icon icon-form-gender"></i></div>
		          <div class="item-inner">
		            <div class="item-title label">性别</div>
		            <div class="item-input">
		              <input type="text" placeholder="" disabled value="<?php echo $row['sex'];?>">
		            </div>
		          </div>
		        </div>
		      </li>
		      <li>
		        <div class="item-content">
		          <div class="item-media"><i class="icon icon-form-password"></i></div>
		          <div class="item-inner">
		            <div class="item-title label">生日</div>
		            <div class="item-input">
		              <input type="text" placeholder="Password" class="" disabled value="<?php echo $row['Birth'];?>">
		            </div>
		          </div>
		        </div>
		      </li>	
		      <li class="item-content">
			        <div class="item-media"><i class="icon icon-f7"></i></div>
			        <div class="item-inner">
			          <div class="item-title label">身份</div>
			          <?php
			          	if ($row['ifAdmin']==0) {
			          ?>
			          	<div class="item-input">
			              <input type="text" placeholder="Password" class="" disabled value="普通用户">
			            </div>
			          <?php
			          	}else{
			          ?>
			          	<div class="item-input">
			              <input type="text" placeholder="Password" class="" disabled value="管理员">
			            </div>
			          <?php		
			          	}
			          ?>
			          
			        </div>
			      </li>
		      <li>
		        <div class="item-content">
		          <div class="item-media"><i class="icon icon-form-password"></i></div>
		          <div class="item-inner">
		            <div class="item-title label">密码</div>
		            <div class="item-input">
		              <input type="text" placeholder="Password" class="password" value="<?php echo $row['password'];?>" name='Password'>
		            </div>
		          </div>
		        </div>
		      </li>		      
		    </ul>
		  </div>
		  <div class="content-block">
		  	  <div class="content-block-title">只有密码可以修改哦,输入密码即可修改密码</div>
		      <div><a href="#" class="button button-big button-fill button-success" id="tj">保存修改</a></div>
		      <div><a href="#" class="button button-big button-fill button-danger" style="margin-top: 9px;" id="shanchu">删除用户</a></div>
		    </div>
		  </div>
	</div>	  			      
	<script type="text/javascript">
		var username='<?php echo $username;?>';
		$('#shanchu').click(function(){			
			var r=confirm("你确定要删除吗？")
			  if (r==true)
			    {
			    	$.post("shanchu_user.php",
			     {
			         username:username
			    },
			    function(data,status){
			    	window.location.href='admin_Main.php?id=2';
			        alert("数据: \n" + data + "\n状态: " + status);
			});
			    }
			  else
			    {
			    window.location.reload();
			    }		
		});
		$('#tj').click(function(){			
			$.post("admin_xgmm.php",
			    {
			        username:username,
			        password:$('.password').val()
			    },
			    function(data,status){
			    	window.location.reload();
			        alert("数据: \n" + data + "\n状态: " + status);
			});
		});
		$('.qx').click(function(){
			$.post("qx_dianzan.php",
			    {
			        // wz_Id:wz_Id
			    },
			    function(data,status){
			    	window.location.reload();
			        alert("数据: \n" + data + "\n状态: " + status);
			});
		});
		$('#pl').click(function(){
			// if ($('#pl_content').val()=='') {
			// 	alert('评论不能为空哦');
			// 	return false;
			// }
			$.post("pinglun.php",
			    {
			        // wz_Id:wz_Id,
			        // pl_content:$('#pl_content').val()
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