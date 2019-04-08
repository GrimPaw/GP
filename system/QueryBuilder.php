<?php
/**
 * Created by PhpStorm.
 * User: Bitrix2
 * Date: 08.04.2019
 * Time: 18:37
 */

namespace Engine;


class QueryBuilder extends ActiveR
{

    public static $sql;

    public function __construct()
    {
        parent::__construct();

    }

    public function test()
    {
        return self::$sql;
    }


}