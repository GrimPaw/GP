<?php
namespace Engine;

class Field
{
	protected $name = null;
	protected $operator = null;
	protected $comps = array();
	protected $incomplete = false;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function addTest($operator, $value)
	{
		$this->comps[] = array(
			'name' => $this->name,
			'operator' => $operator,
			'value' => $value
		);
	}

	public function getComps()
	{
		return $this->comps;
	}

	public function isIncomplete()
	{
		return empty($this->comps);
	}
}

class Identity {
	protected $currentField = null;
	protected $fields = array();
	private $and = null;
	private $enforce = array();

	public function __construct($field = null, array $enforce = null)
	{
		if(!is_null($enforce)) {
			$this->enforce = $enforce;
		}

		if(!is_null($field)) {
			$this->fields = $field;
		}
	}

	public function getObjFields()
	{
		return $this->enforce;
	}

	public function field($fieldname)
	{
		if(!$this->isVoid() && $this->currentField->isIncomplete()) {
			throw new \Exception("Неполное поле");
		}

		$this->enforceField($fieldname);

		if(isset($this->fields[$fieldname])) {
			$this->currentField = $this->fields[$fieldname];
		} else {
			$this->currentField = new Field($fieldname);
			$this->fields[$fieldname] = $this->currentField;
		}

		return $this;
	}

	public function enforceField($fieldname)
	{
		if(!in_array($fieldname, $this->enforce) && !empty($this->enforce)) {
			$forcelist = implode(', ', $this->enforce);
			throw new \Exception("{$fieldname} не является корректным полем {$forcelist}");
		}
	}

	public function isVoid()
	{
		return empty($this->fields);
	}

	public function eq($value)
	{
		return $this->operator("=", $value);
	}

	public function lt($value)
	{
		return $this->operator("<", $value);
	}

	public function gt($value)
	{
		return $this->operator(">", $value);
	}

	private function operator($symbol, $value) {
		if($this->isVoid()) {
			throw new \Exception("Поле не определено");
		}

		$this->currentField->addTest($symbol, $value);
		return $this;
	}

	public function getComps()
	{
		$comparisons = array();
		foreach ($this->fields as $key => $field) {
			$comparisons = array_merge($ret, $field->getComps());
		}

		return $comparisons;
	}
}

$obj = new Identity();

echo "<pre>";
$test = $obj->field("name")->eq("good")->field("start")->gt(time())->lt(time() + (24*60*60));

print_r($test);
