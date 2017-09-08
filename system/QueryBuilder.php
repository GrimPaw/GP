<?php
namespace Engine;
use Engine\Query;

class QueryBuilder extends Query
{

	public static function className() {
		return get_called_class();
	}

	public function buildWhere()
	{
		$query = (new Query())->where("id");
		return $query;
	}
}