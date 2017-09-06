<?php
/**
 * Created by PhpStorm.
 * User: Whisk
 * Date: 03.09.2017
 * Time: 23:44
 */

namespace Engine;


class AcR
{
	protected $const = [];

	public static function find()
	{
		return new AcQ();
	}

	public function asd($val)
	{
		$this->const[] = [
			"val" => $val
		];
	}

}

class AcQ extends AcR
{

	public $where = [];

	public $set = [];


	public function __construct()
	{
		return $this->builder();
	}


//	public function addParams($params)
//	{
//		$this->fields[] = $params;
//		return $this;
//	}

	public function where($param = null)
	{
		$this->where[] = $param;
		return $this;
	}

	public function set($param)
	{
		$this->set[] = $param;
		return $this;
	}

	public function stringer()
	{
		$string = sprintf("where: %s, set: %s",
			implode(", ", $this->where),
			implode(", ", $this->set)
		);

		return $string;
	}

	public function builder()
	{
		$bs = $this->stringer();
		$bs = explode(", ", $bs);

		return $bs;
	}

	public function __toString()
	{
		return $this->stringer();
	}

}


$a = AcR::find()->where(["id" => 1])->set(1);
//$b = AcR::find()->stringer();

echo "<pre>";
print_r($a);

//print_r($b);

