<?phpif(isset($_POST['admin_username']) && isset($_POST['admin_password'])){	shell_exec("/bin/sh /vpnserver/cmd/start.sh");	$nMaxCount=0; if($nMaxCount==0) {  ?>   <!DOCTYPE html><html lang="zh-cn">    <head>        <meta charset="UTF-8">        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />                <style type="text/css">        #center{                position:absolute;                left:50%;                top:50%;                margin-left: -140px;                margin-top: -70px;               }        </style>        <title>StrongSEVPN</title>              </head>     <body>      <div id='center'>	       <span style="font-size:35px">运行成功</span>       <input id="backbutton" value="返回" type="button"								style="height:70px; width:280px; display:block; font-familiy:宋体; font-size:30px;"onclick="Back()">															</div>						</body>  <script>        function Back()        {         history.go(-1);        }  </script></html><?php  return; } $nMaxPage=ceil($nMaxCount/10);  //EnterKey $CoreKey=sprintf("getrunlogcore.php?u=%s&p=%s&",$_POST['admin_username'],$_POST['admin_password']);  ?>  <!DOCTYPE html><html lang="zh-cn">    <head>        <meta charset="UTF-8">        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />                <style type="text/css">        #center{                position:absolute;                left:50%;                top:50%;                margin-left: -170px;                margin-top:-265px;                       </style>        <title>StrongSEVPN</title>              </head>     <body>      <div id='center'>	            <input type="hidden" id="SaveCoreKey" value="<?php echo $CoreKey;?>">            <input type="hidden" id="SaveNowPage" value="1">            <input type="hidden" id="SaveMaxPage" value="<?php echo $nMaxPage;?>">             <iframe id="ShowPlatform" src="<?php echo $CoreKey."n=1";?>" frameborder="true" scrolling="yes" style="border:block;display:block;" width="330" height="410" >       </iframe>              <span style="font-size:20px;"><?php echo "当前文件共".$nMaxCount."行,共".$nMaxPage."页";?></span>       <br>                     <span style="font-size:27px;">当前页数</span>       <input type='text' id="UserNowPageIndex" maxlength="30" size="30" value="1" style="height:30px;width:110px;display:inline-block;font-familiy:宋体;font-size:25px;" onkeyup='this.value=this.value.replace(/\D/gi,"")'/>              <input id="gopagebutton" value="跳转" type="button"								style="height:35px; width:105px; display:inline-block; font-familiy:宋体; font-size:25px;"onclick="GoPage()">								<form action="console.php" method="post">       <input id="lastbutton" value="上一页" type="button"								style="height:50px; width:110px; display:inline-block; font-familiy:宋体; font-size:25px;"onclick="LastPage()">																<input id="nextbutton" value="下一页" type="button"								style="height:50px; width:110px; display:inline-block; font-familiy:宋体; font-size:25px;"onclick="NextPage()">								              <input type="hidden" name="admin_username" value="<?php echo @$_POST['admin_username'];?>">                <input type="hidden" name="admin_password" value="<?php echo @$_POST['admin_password'];?>">               <input id="backbutton" value="返回" type="submit"								style="height:50px; width:110px; display:inline-block; font-familiy:宋体; font-size:25px;">								</form>       															</div>						</body>  <script>        function GoPage()        {         var vCoreKey=document.getElementById("SaveCoreKey").value;         var vNowPage=document.getElementById("UserNowPageIndex").value;         vCoreKey+="n=";         if(vNowPage>1)         {          vNowPage--;          vCoreKey+=(vNowPage*20);          vNowPage++;         }         else         {          vCoreKey+=vNowPage;         }         document.getElementById("SaveNowPage").value=vNowPage;         document.getElementById("ShowPlatform").src=vCoreKey;        }        function LastPage()        {         var vCoreKey=document.getElementById("SaveCoreKey").value;         var vNowPage=document.getElementById("SaveNowPage").value;                  vCoreKey+="n=";         if(vNowPage>1)         {          vNowPage--;         }         if(vNowPage>1)         {          vNowPage--;          vCoreKey+=(vNowPage*20);          vNowPage++;         }         else         {          vCoreKey+=vNowPage;         }                  document.getElementById("SaveNowPage").value=vNowPage;         document.getElementById("UserNowPageIndex").value=vNowPage;         document.getElementById("ShowPlatform").src=vCoreKey;        }        function NextPage()        {         var vCoreKey=document.getElementById("SaveCoreKey").value;         var vNowPage=document.getElementById("SaveNowPage").value;         var vMaxPage=document.getElementById("SaveMaxPage").value;         vCoreKey+="n=";         if(vNowPage<vMaxPage)         {          vNowPage++;         }         if(vNowPage>1)         {          vNowPage--;          vCoreKey+=(vNowPage*20);          vNowPage++;         }         else         {          vCoreKey+=vNowPage;         }                  document.getElementById("SaveNowPage").value=vNowPage;         document.getElementById("UserNowPageIndex").value=vNowPage;         document.getElementById("ShowPlatform").src=vCoreKey;                 }  </script></html><?php}?>