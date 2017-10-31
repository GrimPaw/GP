<?php
namespace Engine;
use Engine\Query;

class QueryBuilder
{
	public $field = [];
	public $query;

	public function __construct($query)
	{
		return $this->buildWhere($query);
	}

	public function buildWhere($query)
	{
		$this->field[] = $query;
	}

}