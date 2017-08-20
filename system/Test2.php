<?php
namespace Engine;


class SF {

	protected $name = null;
	protected $comps = array();

	public function __construct($name)
	{
		$this->name = $name;
	}


	public function addTest($value)
	{
		$this->comps[] = array(
			'value' => $value
		);
	}

	public static function find()
	{

		return new Bycacle();

	}

	public function isIncomplete()
	{
		return empty($this->comps);
	}
}

class Bycacle {

	public $fields = [];
	protected $currentField = null;

//	public function __construct($field = null)
//	{
//
//		if(!is_null($field)) {
//			$this->fields = $field;
//		}
//	}


	public function where($fields)
	{

		if(!$this->isVoid() && $this->currentField->isIncomplete()) {
			throw new \Exception("Неполное поле");
		}

		if(isset($this->fields[$fields[0]])) {
			$this->fields = $this->fields[$fields];
		} else {
			$this->fields = new SF($fields);
		}

		return $this;
	}


	public function isVoid()
	{
		return empty($this->fields);
	}

	public function set($val)
	{
		return $this->operator($val);
	}

	public function setar($val)
	{
		return $this->operator($val);
	}

	public function get($val)
	{
		return $this->operator($val);
	}

	public function operator($value)
	{
		$this->fields->addTest($value);
		return $this;
	}

}



$fac = SF::find()->where(["test" => 1])->set(1)->get(2)->setar(3);

echo "<pre>";
//print_r($fac);
foreach ($fac as $s) {
	print_r($s);
};
