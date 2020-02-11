<?php
require 'zenq/init.php';
$oRefPage = oRoute::ref();

$app = new App();

if($oRefPage == 'login'){$app->login();}
elseif($oRefPage == 'member-new'){$app->member_new();}
?>