<?php
// PDO optional
$DBopt = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];


$DBHost = "localhost";
$DBName = "gp";
$DBLogin = "root";
$DBPass = "";