<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$a = new \Engine\Query();
$a->where('id')->orderBy('name');
//$aa = $a->create($a);

//$b = new \Engine\QueryBuilder($a);
//$b->test();



//$c = new \Engine\Test2();
//$c->getTest();

echo "<pre>";
print_r($a);
//print_r($b);
//print_r($c);
