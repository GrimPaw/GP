<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$obj = new \Engine\Query();

$a = $obj->select(['id', 'name'])->from('user', 'u')->where('id = 3');

//echo  $a;

echo "<pre>";
print_r($a);