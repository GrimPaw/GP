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
	public $fields = [];


	public function __construct()
	{
	}


	public function addParams($params)
	{
		$this->fields[] = $params;
		return $this;
	}

	public function where($param = null)
	{
		$this->addParams($param);
		return $this;
	}

	public function set($param)
	{
		$this->addParams($param);
		return $this;
	}


	public function stringer($from)
	{
		return new self([
			"where" => $from->where
		]);
	}
}


$a = AcR::find()->where(["id" => 1])->set(1);
//$b = AcR::find()->stringer($a);

echo "<pre>";
print_r($a);
//print_r($b);