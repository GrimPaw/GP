<?php
$loader = require __DIR__ . '/vendor/autoload.php';
define('DIR_ROOT', dirname(__FILE__));
$obj = new \Engine\Query();

$a = $obj->select(['id', 'name'])->from('user', 'u')->where('id = 3');


$AR = new \Engine\ActiveR();
//echo  $a;

echo "<pre>";
print_r($a);
print_r($AR);