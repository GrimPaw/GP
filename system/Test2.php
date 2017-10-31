<?php
namespace Engine;
use Engine\QueryBuilder;

class Test2
{
	private $build;

	public function setBuilder(QueryBuilder $query)
	{
		$this->build = $query;
	}

	public function getTest()
	{
		return $this->build->test();
	}
}