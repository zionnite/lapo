<?php
require 'zenq/init.php';
$oRefPage = oRoute::ref();
$oPage = oRoute::page();

$app = new App();

if($oRefPage == 'login' && $oPage == 'go'){$app->login();}
elseif($oRefPage == 'member-new' && $oPage == 'go'){$app->member_new();}
elseif($oPage == 'members'){$members = $app->members();}
?>