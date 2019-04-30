<?php
$loader = require __DIR__ . '/vendor/autoload.php';
define('DIR_ROOT', dirname(__FILE__));
$obj = new \Engine\Query();
$AR = new \Engine\ActiveR();

$a = $obj->select(['id', 'name'])->from('user', 'u')->where('id = 3');



//echo  $a;
$query = $AR::find();
$user = $query->select(['id', 'name'])->from('user', 'u')->where('u.id=1');
//$user = $AR::find()->select(['id', 'name'])->from('user', 'u')->where('u.id=1');

echo "<pre>";
print_r($AR);
print_r($user);