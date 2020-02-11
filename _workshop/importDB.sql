DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BIND` char(50) DEFAULT NULL,
  `MemberID` char(50) DEFAULT NULL,
  `Username` char(50) DEFAULT NULL,
  `Password` char(50) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT '1',
  `Type` tinyint(4) DEFAULT '1',
  `FirstName` char(50) DEFAULT NULL,
  `LastName` char(50) DEFAULT NULL,
  `Email` char(50) DEFAULT NULL,
  `Phone` char(50) DEFAULT NULL,
  `Gender` char(50) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `Savings` bigint(20) DEFAULT '0',
  `Loans` bigint(20) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `BIND` (`BIND`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

REPLACE INTO `user` (`ID`, `BIND`, `MemberID`, `Username`, `Password`, `Status`, `Type`, `FirstName`, `LastName`, `Email`, `Phone`, `Gender`, `DoB`, `Savings`, `Loans`) VALUES
	(1, '01012012', NULL, 'admin', 'admin', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'P78173466', '121', NULL, NULL, 1, 1, 'John', 'Snow', 'john@snow.com', '09038877672', 'Male', '1950-11-29', 0, 0),
	(3, 'F71981370', '434', NULL, NULL, 1, 1, 'Richard', 'Priar', 'rich@priar.com', '09038877953', 'Male', '1950-11-16', 0, 0),
	(4, 'U54497406', '434', NULL, NULL, 1, 1, 'Zuric', 'Priar', 'zuric@priar.com', '09038877956', 'Male', '1950-04-16', 0, 0),
	(5, 'L15320836', '434', NULL, NULL, 1, 1, 'Madelena', 'Priar', 'madelena@priar.com', '09038877951', 'Female', '1950-11-16', 0, 0);
