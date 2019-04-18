<?php
/**
 * Created by PhpStorm.
 * User: Bitrix2
 * Date: 02.04.2019
 * Time: 17:44
 */

namespace Engine;


/*class Query implements QueryInterface
{
    private $fields = [];
    private $from = [];
    private $where = [];


    public function select(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function from($table, $alias)
    {
        $this->from[] = $table. " AS ". $alias;
        return $this;
    }

    public function where($condition)
    {
        $this->where[] = $condition;
        return $this;
    }


    public function __toString()
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s',
            implode(', ', $this->fields),
            implode(', ', $this->from),
            implode(' AND ', $this->where)
        );
    }

}*/