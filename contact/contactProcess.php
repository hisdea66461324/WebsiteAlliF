<?php
require_once($_SERVER['DOCUMENT_ROOT']."/eoqkrskfk0404/include/include.php");
$strName = !array_key_exists("vName", $_POST) ? "" : $_POST["vName"];
$strCompany = !array_key_exists("vCompany", $_POST) ? "" : $_POST["vCompany"];
$strEmail = !array_key_exists("vEmail", $_POST) ? "" : $_POST["vEmail"];
$strTopic = !array_key_exists("vTopic", $_POST) ? "" : $_POST["vTopic"];
$strMessage = !array_key_exists("vMessage", $_POST) ? "" : $_POST["vMessage"];


if($strName == "") {
	ScriptMsgMove("Enter Name.", "/contactus/index.php");	
	exit; 
}
if($strEmail == "") {
	ScriptMsgMove("Enter Email.", "/contactus/index.php");	
	exit; 
}
if($strTopic == "") {
	ScriptMsgMove("Enter Topic.", "/contactus/index.php");	
	exit; 
}
if($strMessage == "") {
	ScriptMsgMove("Enter Message.", "/contactus/index.php");	
	exit; 
}

if($strEmail == "trxlj@dropjar.com"){
	ScriptMsgMove("submit complete.", "/support/index.php");
	exit;
}


$subject = "[Contact Us] About ".$strTopic." From ".$strName;
//$strMessage = "your message";
//$toMail = "hisdea@joycle.com";
//$headers = 'From: homepage@joycle.com'."\r\n".'Content-Type: text/plain; charset=utf-8'."\r\n";
//$mail_sent = @mail($toMail, '=?utf-8?B?'.base64_encode($subject).'?=', $strMessage, $headers);

$strMessage.="\n [Return Mail] : ".$strEmail;

$mailData = array(
	"mailto"=>"support@joycle.com",
	"subject"=>$subject,
	"body"=>$strMessage
);

$url = 'https://jungletumbler.appspot.com/admin/SendMail/';
$mailData = http_build_query($mailData);

$context_options = array (
        'http' => array (
            'method' => 'POST',
            'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-Length: " . strlen($mailData) . "\r\n",
            'content' => $mailData
            )
        );

		$result = "";
   		for($chkIndex = 0; $chkIndex < 10; $chkIndex++) { 
			$context = stream_context_create($context_options);
			$fp = fopen($url, 'r', false, $context);
			if($fp === FALSE) {
				continue;
			} else {
				while(!feof($fp)) {
					$result .= fread($fp, 8192);
				}
				break;
			}
		}
		fclose($fp);
print_r($result);

//connect DB
$DB = new MsSqlObject();
$DB->connect();
$strSql = "INSERT INTO contactus (vName, vCompany, vEmail, vTopic, vMessage, regitDate) ";
$strSql.= "VALUES('".$strName."', '".$strCompany."', '".$strEmail."', '".$strTopic."', '".$strMessage."', GETDATE())";
$DB->query($strSql);
ScriptMsgMove("submit complete", "/contactus/index.php");	
exit;
?>