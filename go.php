<?php
require 'zenq/init.php';
echo $oRefPage = oRoute::ref();

echo oDATA::oRead('UserID', 'oPOST');
?>