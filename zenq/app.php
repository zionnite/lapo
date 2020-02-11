<?php
class App {

	public static function login(){
		$username = oDATA::oRead('UserID', 'oPOST');
		$password = oDATA::oRead('Password', 'oPOST');

		$sql = "SELECT * FROM `user` WHERE `Username` = '{$username}' AND `Password` = '{$password}' AND `Status` = 2 LIMIT 1";
		$rez = oSQL::run($sql);
		if(!empty($rez['errNo'])){
			#Todo ~ error in query (everywhere)
		}
		elseif($rez['numRows'] < 1){
			oRoute::redirect('login.php?state=invalid');
		}
		elseif($rez['numRows'] === 1){
			$record = $rez['result']->fetch_assoc();
			$_SESSION['user'] = $record['BIND'];
			oRoute::redirect('index.php');
		}
	}



	// Create new member
	public static function member_new(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$MemberID = oDATA::oRead('MemberID', 'oPOST');
		$FirstName = oDATA::oRead('FirstName', 'oPOST');
		$LastName = oDATA::oRead('LastName', 'oPOST');
		$Email = oDATA::oRead('Email', 'oPOST');
		$Phone = oDATA::oRead('Phone', 'oPOST');
		$Gender = oDATA::oRead('Gender', 'oPOST');
		$DoB = oDATA::oRead('DoB', 'oPOST');

		$sql = "INSERT INTO `user` (`BIND`, `MemberID`, `FirstName`, `LastName`, `Email`, `Phone`, `Gender`, `DoB`) VALUES
		('$BIND', '$MemberID', '$FirstName', '$LastName', '$Email', '$Phone', '$Gender', '$DoB')";
		$rez = oSQL::run($sql);
		if(!empty($rez['errNo'])){} #Todo ~ error in query (everywhere)
		elseif($rez['affectedRows'] === 1){
			oRoute::redirect(oRoute::ref().'.php?state=success');
		}
	}

	// View all members
	public static function members($return=''){
		$sql = "SELECT * FROM `user` WHERE `Type` = 1 ORDER BY `LastName` ASC";
		$rez = oSQL::run($sql);
		if(empty($rez['errNo']) && $rez['numRows'] > 0){
			$record = $rez['result']->fetch_all(MYSQLI_ASSOC);
			if($return == 'JSON'){return json_encode($record);}
			return $record;
		}
	}

	// View member's information
	public static function member($value, $filter='BIND', $return='*'){
		$sql = "SELECT {$return} FROM `user` WHERE `{$filter}` = '{$value}' LIMIT 1";
		$rez = oSQL::run($sql);
		if(empty($rez['errNo']) && $rez['numRows'] > 0){
			$record = $rez['result']->fetch_all(MYSQLI_ASSOC);
			return $record;
		}
	}



}
?>