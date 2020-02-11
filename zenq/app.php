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
			return $record[0];
		}
	}

	// View member's last loan
	public static function lastloan($value, $filter='MemberID', $return='*'){
		$sql = "SELECT {$return} FROM `loan` WHERE `{$filter}` = '{$value}' LIMIT 1";
		$rez = oSQL::run($sql);
		if(empty($rez['errNo']) && $rez['numRows'] > 0){
			$record = $rez['result']->fetch_all(MYSQLI_ASSOC);
			return $record[0];
		}
	}


	// Post new transaction
	public static function transaction_post(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$TransID = mt_rand(10000000,99999999);
		$MemberID = oDATA::oRead('MemberID', 'oPOST');
		$MemberRow = self::member($MemberID, 'MemberID', 'BIND');
		$MemberBIND = $MemberRow['BIND'];
		$type = oDATA::oRead('transactionType', 'oPOST');
		$amount = oDATA::oRead('transactionAmount', 'oPOST');
		$date = oDATA::oRead('transactionDate', 'oPOST');

		if($type == 'savings'){
			$row = self::member($MemberID, 'MemberID', 'Savings');
			$savings = ($row['Savings'] + $amount);
			$sql = "UPDATE `user` SET `Savings` = '{$savings}' WHERE `MemberID` = '{$MemberID}' LIMIT 1;";
			$rez = oSQL::run($sql);

			$sql = " INSERT INTO `transaction` (`BIND`, `Member`, `MemberID`, `Amount`, `Type`, `TransDate`, `TransID`)
			VALUES ('$BIND', '$MemberBIND', '$MemberID', '$amount', '$type', '$date', '$TransID')";
			$rez = oSQL::run($sql);
			if(!empty($rez['errNo'])){} #Todo ~ error in query (everywhere)
			else{
				oRoute::redirect(oRoute::ref().'.php?state=success');
			}
		}
	}

	// Post loan payment
	public static function loan_payment(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$TransID = mt_rand(10000000,99999999);
		$MemberID = oDATA::oRead('MemberID', 'oPOST');
		$MemberRow = self::member($MemberID, 'MemberID', 'BIND');
		$MemberBIND = $MemberRow['BIND'];
		// $type = 'repayment';
		$amount = oDATA::oRead('transactionAmount', 'oPOST');
		$date = oDATA::oRead('transactionDate', 'oPOST');

		$loan = self::lastloan($MemberID, 'MemberID');

		$monthPrincipal = ($loan['IntPrin'] - $loan['Interest']);
		$monthInterest = $loan['Interest'];
		$monthTotal = $loan['IntPrin'];

		if($amount > $loan['IntPrin']){
			//remove principal for current month
			$paymentPrincipal = ($amount - $monthTotal);
			// $paymentBal = ($amount - $monthTotal);
			// $paymentBal = ($amount - $monthTotal);

		}
		die;

		// $savings = ($row['Savings'] + $amount);
		// $sql = "UPDATE `user` SET `Savings` = '{$savings}' WHERE `MemberID` = '{$MemberID}' LIMIT 1;";
		// $rez = oSQL::run($sql);

		// $sql = " INSERT INTO `transaction` (`BIND`, `Member`, `MemberID`, `Amount`, `Type`, `TransDate`, `TransID`)
		// VALUES ('$BIND', '$MemberBIND', '$MemberID', '$amount', '$type', '$date', '$TransID')";
		// $rez = oSQL::run($sql);
		// if(!empty($rez['errNo'])){
		// 	#Todo ~ error in query (everywhere)
		// }
		// else {
		// 	oRoute::redirect(oRoute::ref().'.php?state=success');
		// }
	}


	// Prepare loan
	public static function loan_prepare(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$LoanID = mt_rand(10000000,99999999);
		$MemberID = oDATA::oRead('MemberID', 'oPOST');
		$MemberRow = self::member($MemberID, 'MemberID', 'BIND');
		$MemberBIND = $MemberRow['BIND'];

		$type = oDATA::oRead('Type', 'oPOST');
		$DisbursedAs = oDATA::oRead('DisbursedAs', 'oPOST');
		$Principal = oDATA::oRead('Principal', 'oPOST');
		$ReleaseDate = oDATA::oRead('ReleaseDate', 'oPOST');
		$InterestRate = oDATA::oRead('InterestRate', 'oPOST');
		$Duration = oDATA::oRead('Duration', 'oPOST');
		$Interest = ($InterestRate * 100)/$Duration;
		$IntPrin = ($Principal/$Duration) + $Interest;
		$RepaymentCycle = oDATA::oRead('RepaymentCycle', 'oPOST');
		$RepaymentCount = oDATA::oRead('RepaymentCount', 'oPOST');
		// $RepaymentCycle = oDATA::oRead('RepaymentCycle', 'oPOST');
		// $RepaymentCycle = oDATA::oRead('RepaymentCycle', 'oPOST');
		// $RepaymentCycle = oDATA::oRead('RepaymentCycle', 'oPOST');
		$row = self::member($MemberID, 'MemberID', 'Loans');
		$loans = ($row['Loans'] + $Principal);
		$sql = "UPDATE `user` SET `Loans` = '{$loans}' WHERE `MemberID` = '{$MemberID}' LIMIT 1;";
		$rez = oSQL::run($sql);


		$sql = " INSERT INTO `loan` (`BIND`, `Member`, `MemberID`, `Type`, `DisbursedAs`, `Principal`, `ReleaseDate`, `InterestRate`, `Duration`, `Interest`, `IntPrin`, `LoanID`, `RepaymentCycle`, `RepaymentCount`)
		VALUES ('$BIND', '$MemberBIND', '$MemberID', '$type', '$DisbursedAs', '$Principal', '$ReleaseDate', '$InterestRate', '$Duration', '$Interest', '$IntPrin', '$LoanID', '$RepaymentCycle', '$RepaymentCount')";
		$rez = oSQL::run($sql);
		if(!empty($rez['errNo'])){} #Todo ~ error in query (everywhere)
		else{
			oRoute::redirect(oRoute::ref().'.php?state=success');
		}
	}



}
?>