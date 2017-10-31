<?php
namespace Engine;
use Engine\QueryInterface;

class Query implements QueryInterface
{

	public $fields = [];

	/*
	 * set array where
	 */
	protected $where = [];

	/*
	 * set string order by
	 */
	protected $orderBy = "";


	/*
	 * Part of query WHERE
	 *
	 * @param array|string
	 * @return $this
	 */
	public function where($param)
	{
		$this->where[] = $param;
		$this->addParams($param);
		return $this;
	}

	/*
	 * Part of query ORDER BY
	 *
	 * @param string
	 * @return $this
	 */
	public function orderBy($param)
	{
		$this->orderBy = $param;
		$this->addParams($param);
		return $this;
	}


	public function addParams($param)
	{
		$this->fields[] = new QueryBuilder($param);
	}

	public function stringer()
	{
		return sprintf("where: %s",
			implode(", ", $this->fields)
		);
	}

//	public function __toString()
//	{
//		return sprintf("where: %s",
//			implode(", ", $this->where)
//		);
//	}
}