<?php
$loader = require __DIR__ . '/vendor/autoload.php';
define('DIR_ROOT', dirname(__FILE__));
$obj = new \Engine\QueryBuilder();
$AR = new \Engine\ActiveR();
//$a = $obj->select(['id', 'name'])->from('user', 'u')->where('id = 3');



$query = $AR::find();
$user = $query->select(['id', 'name'])->from('user', 'u')->where('id',3);


function clientCode(\Engine\QueryBuilder $queryBuilder)
{

    $query = $queryBuilder
        ->select(['id', 'name'])
        ->from('user', 'u')
        ->where('id',3)
        ->getSQL();

    echo $query;

}

clientCode(new \Engine\QueryBuilder());
echo "<pre>";
print_r($user);
//echo $qu;