<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$obj = new \Engine\Query();
$AR = new \Engine\ActiveR();


$a = $obj->select(['id', 'name'])->from('user', 'u')->where('id = 3');

//echo  $a;
$ds = $AR->init("config.php");
print_r($ds["dbname"]);
echo "<pre>";
print_r($a);
print_r($AR);