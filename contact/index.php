<?php
header('Content-Type: text/html; charset=utf-8');
header("Pragma: no-cache");   
header("Cache-Control: no-cache,must-revalidate");  
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function formSubmit()
{
	if($("#vName").val() == ""){
		alert("Enter your name.");
		$("#vName").focus();
		return;
	}
	if($("#vEmail").val() == ""){
		alert("Enter your E-mail");
		$("#vEmail").focus();
		return;
	}
	if($("#vTopic").val() == ""){
		alert("Choose Topic.");
		$("#vTopic").focus();
		return;
	}
	if($("#vMessage").val() == ""){
		alert("Enter Message");
		$("#vMessage").focus();
		return;
	}
	$("#contactForm").submit();
}	

//-->	
</script>
<style>
body {
    color: #000000;
    font-family: Verdana;
    font-weight:lighter;
    font-size: 80%;
    line-height: 1.2em;
    margin: 0 auto;
    padding: 0;
    text-align: left;
    background-color:#ffffff;
}	

	

.subTitle{
	font-family: Verdana;
  font-weight:bold;
  font-size: 100%;
  line-height: 2.2em;
}
	
.topMenu{
	background-color:  #3D3D3D;
	height:70px;
}

.topMenu div {
		color:#FFF;
		font-size:20px;
		font-weight:normal;
	
		padding-left:20%;

		padding-top:40px;
}

.subtop {
	background-color:#FFF;
	text-align:center;
	width:100%;
	height:40px;
}

.menuItem{
	text-align:center;
	color:#6f6557;
}

.menuLink a {
	font-weight:lighter;
	outline: 0 none;
  text-decoration: none;
  color:#FFF;
}

.menuLink a {
	 outline: 0 none;
   text-decoration: none;
   color:#FFF;
}

.menuLink a:visited {
	outline: 0 none;
  text-decoration: none;
  color:#FFF;
}
.menuLink a:focus {
    color: #ffffff;
    outline: thin dotted;
}
.menuLink a:hover {
		color: #ffffff;
    outline: 0 none;
    text-decoration: underline;
}

.menuLink li {
	color:#ffffff;
	list-style-type:none;
	padding: 3px 0px;
	margin-left:-43px;
}

.menuLink li.facebook {
		margin-top:5px;
}

.menuLink li.joycle {
		font-weight:normal;
}

.st_facebook_custom {
    background: url("/images/facebookIcon.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    cursor: pointer;
    display: inline-block;
    height: 40px;
    text-align:right;
    width: 40px;
}

h3 {
		padding-top:15px;
		padding-bottom:0px;
		margin-bottom:7px;
}

div #inquiryType-button {
		padding-top:7px;
		padding-bottom:7px;
}

div #purchaseItem-button {
		padding-top:7px;
		padding-bottom:7px;
}

div .ui-checkbox {
	margin-bottom:-2px;
	background-color:#F9F9F9;
}

div .ui-checkbox label {
	background-color:#F9F9F9;
	border-style:none;
}


div #header {
		border-color:#FFFFFF;
		/*margin-bottom:-10px;*/
		background-color:#ffffff;
		text-align:center;
		padding-top:10px;
		padding-bottom:10px;
}

div #footer {
		border-color:#3D3D3D;
		background-color:#3D3D3D;
		text-align:center;
}

div #submitbutton {
	margin-bottom:20px;
}
div #submitbutton div {
		width:200px;
		margin:auto;
}

div #content {
	background-color:#ffffff;
	padding-top:0px;
	width:100%;
}

input#checkCSInfo {
		z-index:3;
}

div #pcWebContent {
	background-color:#ffffff;
		
	margin-left:20%;
	margin-right:20%;

}
.ui-content {
    border-width: 0;
    overflow-x: hidden;
    overflow-y: visible;
    padding: 0em;
    background-color:#ffffff;
}
</style>
</head>
<body>
<div data-role="page" data-theme="b">
  <div data-role="header" id="header">
  	<img src="/img/ci_red.png" width="150px" style="margin-top:0px;">
	</div>
	<div id="pcWebContent">
	<form name="contactForm" id="contactForm" method="POST" action="contactProcess.php" data-ajax="false">
  <div data-role="main" class="ui-content" id="content">
	  <h1>Contact us</h1> 
		<hr color="#b51218" size=4></hr>
		<p>
			Thanks for visiting. <br>
			For Customer Service, we recommend you to access Customer Center through mobile app(Options > Customer Center)  <br>
			Otherwise, please contact us through filling this form.
		</p>
		<h3>Your Name: *</h3>
		<input type="text" name="vName" id="vName" value="">
		<h3>Name of your company</h3>
		<input type="text" name="vCompany" id="vCompany" value="">
		<h3>Email address: *</h3>
		<input type="text" name="vEmail" id="vEmail" value="">
		<h3>Choose a Topic: *</h3>
		<select name="vTopic" id="vTopic">
		  <option value="Games">Games</option>
		  <option value="Jobs">Jobs</option>
		  <option value="Press">Press</option>
		  <option value="Partnerships">Partnerships</option>
		  <option value="Security">Security</option>
		</select>
		<h3>Message: *</h3>
		<textarea name="vMessage" id="vMessage"></textarea>
		<br>
		<br>
		<div id="submitbutton">
		<input type="button" value="Send Message" onClick="javascript:formSubmit();" data-theme="c">
		</div>
  </div>
	</form>
	</div>
  <div data-role="footer" id="footer" data-ajax="false">
		<ul class="menuLink">
			<li><a href="/index.php" rel="external">Home</a></li>
			<li><a href="/contactus/index.php" rel="external">Contact us</a></li>
			<li><a href="/faq/faq.php" rel="external">Support</a></li>
			<li class="facebook"><a href="https://www.facebook.com/jungletumbler" rel="external"><img src="/images/facebookIcon.png" class="st_facebook_custom"></a>&nbsp;&nbsp;<a href="https://twitter.com/jungletumbler" rel="external"><img src="/images/twitterIcon.png" class="st_facebook_custom"></a></li>
				<li class="joycle">@2014 Joycle Inc.</li>
		</ul>
    <div style="margin-right:10px; margin-top:-50px; float: right;">
  	</div>
  </div>
</div>
</body>
</html>




