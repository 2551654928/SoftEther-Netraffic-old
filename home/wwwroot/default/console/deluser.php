<?phpif(isset($_POST['admin_username']) && isset($_POST['admin_password'])){ if(isset($_POST['delusercore'])) {	$user=$_POST['del_username'];	if(!empty(${user}))	{	$bace=exec("/bin/sh /vpnserver/cmd/ShellLogins.sh ${user}");	}	else	{		$nDelResult="用户名为空";	}	if($bace==0)	{		$nDelResult=sprintf("用户[%s]不存在<br>删除用户失败",$_POST['del_username']);	}  else  {	shell_exec("/bin/sh /vpnserver/cmd/UserDelete.sh ${user}");	shell_exec("/bin/sh /vpnserver/cmd/UserDeleteCount.sh ${user}");	shell_exec("/bin/sh /vpnserver/cmd/UserDeletePass.sh ${user}");   $nDelResult=sprintf("用户[%s]删除完毕",$_POST['del_username']);  }   ?>   <!DOCTYPE html><html lang="zh-cn">    <head>        <meta charset="UTF-8">        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />                <style type="text/css">        #center{                position:absolute;                left:50%;                top:50%;                margin-left: -140px;                margin-top: -70px;               }        </style>        <title>StrongSEVPN</title>              </head>     <body>      <div id='center'>	       <span style="font-size:35px"><?php echo $nDelResult;?></span>       <input id="backbutton" value="返回" type="button"								style="height:70px; width:280px; display:block; font-familiy:宋体; font-size:30px;"onclick="Back()">															</div>						</body>  <script>        function Back()        {         history.go(-1);        }  </script></html><?php  return; } ?>  <!DOCTYPE html><html lang="zh-cn">    <head>        <meta charset="UTF-8">        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />                <style type="text/css">        #center{                position:absolute;                left:50%;                top:50%;                margin-left: -155px;                margin-top: -90px;               }        </style>        <title>StrongSEVPN</title>              </head>        <body>      <div id='center'>        <span style="font-size:50px">删除用户</span>                <form action="deluser.php" method="post">        <input type="hidden" name="admin_username" value="<?php echo @$_POST['admin_username'];?>">                <input type="hidden" name="admin_password" value="<?php echo @$_POST['admin_password'];?>">							        <input type="hidden" name= "delusercore" value="1">                <span style="font-size:30px">用户</span>        <input type='text' id="new_username" name="del_username" maxlength="30" size="30" style="height:40px;width:235px;display:inline-block;font-familiy:宋体;font-size:35px;"/>				<br>        <input id="delbutton" value="删除" type="submit"								style="height:50px; width:150px; display:inline-block;font-familiy:宋体;font-size:30px;">										<input id="backbutton" value="返回" type="button"								style="height:50px; width:150px; display:inline-block; font-familiy:宋体; font-size:30px;" onclick="Back()">																</form>															</div>						</body>  <script>        function Back()        {         history.go(-1);        }  </script></html><?php}?>