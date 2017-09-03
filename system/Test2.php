<?php
namespace Engine;


class ActiveR {

	protected $const = [];

	public static function find()
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

	protected $fields = [];


	public function __get($name)
	{
		if(array_key_exists($name, $this->fields)) {
			return $this->toArray();
		}

		return false;
	}
//
//	public function __set($name, $value)
//	{
//		$this->fields[$name] = $value;
//	}


	public function toArray()
	{
		return $this->fields;
	}


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

$a = ActiveR::find()->where(["id" => 1])->set(1);

echo "<pre>";
print_r($a);

foreach ($a as $ass) {
	print_r($ass);
}