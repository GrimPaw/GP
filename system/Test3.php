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

}

class AcQ
{
	public $fields = [];


	public function addParams($params)
	{
		$this->fields[] = $params;
		return $this;
	}

	public function where($param)
	{
		$this->addParams($param);
		return $this;
	}

	public function set($param)
	{
		$this->addParams($param);
		return $this;
	}
}


$a = AcR::find()->where(["id" => 1])->set(1);

echo "<pre>";
print_r($a);