<?php
namespace Engine;
use Engine\QueryInterface;

class Query implements QueryInterface
{
	/*
	 * set array where
	 */
	protected $where = [];

	/*
	 * set string order by
	 */
	private $orderBy = "";


	/*
	 * Part of query WHERE
	 *
	 * @param array|string
	 * @return $this
	 */
	public function where($param)
	{
		$this->where[] = $param;
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
		return $this;
	}

	public function __toString()
	{
		return sprintf("where: %s",
			implode(", ", $this->where)
		);
	}
}