<?php
namespace Engine;

interface QueryInterface
{
    public function find();
    public function select(array $fields);
    public function from($table, $alias);
    public function where($condition);
}