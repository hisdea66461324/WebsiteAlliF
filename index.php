<?php
header('Content-Type: text/html; charset=utf-8');
header("Pragma: no-cache");   
header("Cache-Control: no-cache,must-revalidate");  
$user_agent = strtolower ($_SERVER['HTTP_USER_AGENT']); 
?>
<!DOCTYPE html>
<?
if (!preg_match ("/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
?>
<html>
<head>
<title>ALLif</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width" data-keepAlive="true"/>
<style>
body {
	background-color: #f3f5f4;
	margin:0;
	padding: 0;
	width:100%;
	height:100%;
	text-align:center;
}

#middleSection {
	background-color: #e04945;
	padding:0 0 0 0;
	margin: 0 0 0 0;
	text-align:center;
}

#bottomSection {
	background-color: #f3f5f4;	
	text-align:center;
}

a:link {text-decoration: none; color: #837a7a; font-size:0.8em;}
a:visited {text-decoration: none; color: #837a7a; font-size:0.8em;}
a:active {text-decoration: none; color: #837a7a; font-size:0.8em;}
a:hover {text-decoration: underline; color: #837a7a; font-size:0.8em;}
</style>
</head>
<body>
<div id="middleSection">
	<img src="/images/mainContent.gif"/>
</div>	
<div id="bottomSection">
	<table cellpadding="0" cellspacing="0" border="0" width="1113" align=center>
		<tr>
			<td>
				<img src="/images/bottom_left.gif" id="bottomImg1"/>
			</td>
			<td width=300>
				&nbsp;
			</td>
			<td width=200 align="right">
				<table cellpadding=0 cellspacing=0 border=0 height=50>
					<tr>
						<td valign="top"><a href="mailto:contact@allif.co.kr"><img src="/images/btn_contactus.gif"></a></td>
						<td width=20>&nbsp;</td>
					</tr>
				</table>
			</td>
			<td>
				<img src="/images/bottom_right.jpg" id="bottomImg2"/>
			</td>
		</tr>
	</table>		
</div>	
</body>
</html>
<?
}
else {
?>	
<html>
<head>
<title>ALLif</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<style>
body {
	background-color: #f3f5f4;
	margin:0;
	padding: 0;
	width:100%;
	height:100%;
	text-align:center;
	width:device-width;
}

#middleSection {
	background-color: #e04945;
	padding:0 0 0 0;
	margin: 0 0 0 0;
	text-align:center;
}

#bottomSection {
	background-color: #f3f5f4;	
	text-align:center;
}

a:link {text-decoration: none; color: #837a7a; font-size:0.8em;}
a:visited {text-decoration: none; color: #837a7a; font-size:0.8em;}
a:active {text-decoration: none; color: #837a7a; font-size:0.8em;}
a:hover {text-decoration: underline; color: #837a7a; font-size:0.8em;}
</style>
</head>
<body>
<div id="middleSection">
	<img src="/images/m_mainContent.gif" style="max-width:95%; padding-top:170px; padding-bottom:170px;"/>
</div>
<div id="bottomSection">
	<table cellpadding=0 cellspacing=0 border=0 style="width:95%;" align="center">
		<tr>
			<td width=86%><img src="/images/bottom001.gif" style="width:100%;"></td>
			<td width=14%><a href="mailto:contact@allif.co.kr"><img src="/images/bottom002.gif" style="width:100%;" border=0></a></td>
		</tr>
		<tr>
			<td width=86%><img src="/images/bottom003.gif" style="width:100%;"></td>
			<td width=14%><img src="/images/bottom004.gif" style="width:100%;"></td>
		</tr>
	</table>
</div>	
</body>
</html>

<?
}
?>	





