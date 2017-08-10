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
	 * @return assoc array
	 */
	public function findAll() {
		$sql = "SELECT * FROM $this->table";
		$stmt = $this->db->query($sql);

		return $stmt->fetchAll();
	}

	/*
	 * Выборочно выбираем записи
	 *
	 * @return obj
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

	public function find()
	{
		//		$values = '';
//		$i = 0;
//		foreach ($this->props as $prop) {
//			if($i == 0) {
//				$values .= $prop;
//			} else {
//				$values .= ",".$prop;
//			}
//			$i++;
//		}
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

$dbs = new ActiveR(new PDO("mysql:host=".$DBHost.";dbname=".$DBName, $DBLogin, $DBPass, $DBopt));

$dbs->table = "gp_users";
$dbs->props = ['id', 'login'];

$arr["id"] = 0;
$arr["mass"] = "hie";

echo "<pre>";

$users = $dbs->findOne(['id' => 1, 'login' => 'admin']);
//$usersNames = $dbs->select()->fetch();
print_r($users);
print_r($dbs);