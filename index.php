<?php
$loader = require __DIR__ . '/vendor/autoload.php';
define('DIR_ROOT', dirname(__FILE__));
//$obj = new \Engine\Query();
$obj2 = new \Engine\QueryBuilder();
$AR = new \Engine\ActiveR();
//$a = $obj->select(['id', 'name'])->from('user', 'u')->where('id = 3');



$query = $AR::find();
$user = $query->select(['id', 'name'])->from('user', 'u')->where('id = 3');
//echo  $a;


echo "<pre>";
//print_r($query);
print_r($user);
print_r($obj2::test());