<?php
namespace Engine;
use PDO;

require_once "config.php";

class ActiveR
{
	protected $db;

	public $id;
	public $table;
	public $props = [];

	public function __construct(PDO $db)
	{
		$this->db = $db;
	}


	/*
	 * Выбираем все записи по таблице
	 *
	 * @return array
	 */
	public function findAll() {
		$sql = "SELECT * FROM $this->table";
		$stmt = $this->db->query($sql);

		return $stmt->fetchAll();
	}

	/*
	 * Выборочно выбираем записи
	 *
	 * @return array
	 */
	public function findOne($params)
	{
		if(!is_array($params)) {
			$sql = "SELECT * FROM $this->table WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $params);
			$stmt->execute();

			return $stmt->fetchAll();
		} else {
			/*
			 * @TODO переделать эту каку...
			 */
			$ph_key = '';
			$ph_value = '';
			foreach ($params as $key => $param) {
				$ph_key[] = $key;
				$ph_value[] = $param;
			}

			$sql = "SELECT * FROM $this->table WHERE $ph_key[0] = ? AND $ph_key[1] = ?";
			$stmt = $this->db->prepare($sql);

			$stmt->execute(array($ph_value[0], $ph_value[1]));

			return $stmt->fetchAll();
		}
	}


	/*
	 * Функция дял сортировки поиска
	 *
	 *
	 */
	public function where(array $params)
	{

		$count = count($params);
		$ph_key = '';
		$ph_value = '';

		if($count <= 1) {
			foreach ($params as $key => $param) {
				$ph_key = $key;
				$ph_value = $param;
			}
		} else {
			throw new \Exception('Может быть использовано только 1 свойство.');
		}


		$sql = "SELECT * FROM $this->table WHERE $ph_key = ?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($ph_value));

		return $stmt->fetchAll();
	}

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



$dbs = new ActiveR();
$dbs->table = "gp_users";


echo "<pre>";
$users = $dbs->where(['id' => 1]);
print_r($users);








