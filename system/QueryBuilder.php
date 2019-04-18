<?php
/**
 * Created by PhpStorm.
 * User: Bitrix2
 * Date: 08.04.2019
 * Time: 18:37
 */

namespace Engine;


class QueryBuilder implements QueryInterface
{

    protected $query;

    protected function reset()
    {
        $this->query = new \stdClass();
    }

    public function select(array $fields)
    {
        $this->reset();
        $this->query->base = "SELECT ". implode(", ", $fields);
        $this->query->type = "select";

        return $this;
    }

    public function from($table, $alias)
    {
        $this->query->from[] = $table. " AS ". $alias;
        return $this;
    }

    public function where($field, $value, $operator = "=")
    {
        if(!in_array($this->query->type, ['select', 'update'])) {
            throw new \Exception("WHERE can only be added to SELECT or UPDATE");
        }
        $this->query->where[] = "$field $operator '$value'";
        return $this;
    }

    public function getSql()
    {
        $query = $this->query;
        $sql = $query->base;

        if(!empty($query->where)) {
            $sql .= " WHERE ".implode(' AND ', $query->where);
        }

        $sql .= ";";
        return $sql;
    }

}