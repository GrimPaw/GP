<?php
namespace Engine;


class ActiveR {

	public $const = array();

	public function find()
	{
		return new ActiveQ();
	}


	public function addTest($val)
	{
		$this->const[] = [
			'value' => $val
		];
	}

}

class ActiveQ {

	public $fields = [];

	public function where($param)
	{
		$this->fields = new ActiveR();
		return $this->oper($param);
	}

	public function set($val)
	{
		return $this->oper($val);
	}

	public function oper($val)
	{
		$this->fields->addTest($val);
		return $this;
	}

}


$test = new ActiveR();

$a = $test->find()->where(["id" => 1])->set(1);

echo "<pre>";
print_r($a);