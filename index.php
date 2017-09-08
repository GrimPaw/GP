<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$a = new \Engine\Query();
$a->where('id');

$b = new \Engine\QueryBuilder();
$c = $b->buildWhere();

echo "<pre>";
print_r($a);
print_r($c);