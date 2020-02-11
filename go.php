<?php
require 'zenq/init.php';
$oRefPage = oRoute::ref();
$oPage = oRoute::page();

$app = new App();

if(oMethod::isGet('MID')){
	$MID = oData::oRead('MID', 'oGET');
} elseif(oMethod::isPost('MID')){
	$MID = oData::oRead('MID', 'oPOST');
} else {
	$MID = '';
}
echo $MID;
if($oRefPage == 'login' && $oPage == 'go'){$app->login();}
elseif($oRefPage == 'member-new' && $oPage == 'go'){$app->member_new();}
elseif($oPage == 'members'){$members = $app->members();}
// elseif($oPage == 'member'){$member = $app->member($_GET['ID']);}
elseif($oPage == 'transaction-post'){
	if(i)
		$member = $app->member($_GET['ID']);
}
?>