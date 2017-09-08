<?php
namespace Engine;
use PDO;

class ActiveR
{
	protected $db;

	public $id;
	public $table;
	public $props = [];

	public function __construct()
	{
		$config = $this->init("config.php");

		$this->db = new PDO('mysql:dbname='.$config["dbname"].';host='.$config["dbhost"].'', $config["dbuser"], $config["dbpass"], $config["dbopt"]);
	}


	/*
	 * @param $val - filename to include
	 *
	 * @return file config
	 */
	public function init($val)
	{
		if(is_file($val)) {
			return require $val;
		}
		return false;
	}


	public static function find()
	{
		return new Query();
	}

	/*
	 * Выбираем все записи по таблице
	 *
	 * @return array
	 */
//	public function findAll() {
//		$sql = "SELECT * FROM $this->table";
//		$stmt = $this->db->query($sql);
//
//		return $stmt->fetchAll();
//	}

	/*
	 * Выборочно выбираем записи
	 *
	 * @return array
	 */
//	public function findOne($params)
//	{
//		if(!is_array($params)) {
//			$sql = "SELECT * FROM $this->table WHERE id = :id";
//			$stmt = $this->db->prepare($sql);
//			$stmt->bindParam(":id", $params);
//			$stmt->execute();
//
//			return $stmt->fetchAll();
//		} else {
//			/*
//			 * @TODO переделать эту каку...
//			 */
//			$ph_key = '';
//			$ph_value = '';
//			foreach ($params as $key => $param) {
//				$ph_key[] = $key;
//				$ph_value[] = $param;
//			}
//
//			$sql = "SELECT * FROM $this->table WHERE $ph_key[0] = ? AND $ph_key[1] = ?";
//			$stmt = $this->db->prepare($sql);
//
//			$stmt->execute(array($ph_value[0], $ph_value[1]));
//
//			return $stmt->fetchAll();
//		}
//	}


//	public function where(array $params)
//	{
//
//		$count = count($params);
//		$ph_key = '';
//		$ph_value = '';
//
//		if($count <= 1) {
//			foreach ($params as $key => $param) {
//				$ph_key = $key;
//				$ph_value = $param;
//			}
//		} else {
//			throw new \Exception('Может быть использовано только 1 свойство.');
//		}
//
//
//		$sql = "SELECT * FROM $this->table WHERE $ph_key = ?";
//		$stmt = $this->db->prepare($sql);
//		$stmt->execute(array($ph_value));
//
//		return $stmt->fetchAll();
//	}

	/*
	 * Общий метод, для сохранения значений
	 */
	public function save()
	{

//		$sql = "UPDATE $this->table SET bar = :bar WHERE id = :id";
//		$statement = $this->db->prepare($sql);
//		$statement->bindParam("bar", $this->bar);
//		$statement->bindParam("id", $this->id);
//		$statement->execute();

	}
}