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
	public function selectAll() {
		$sql = "SELECT * FROM $this->table";
		$stmt = $this->db->query($sql);

		return $stmt->fetchAll();
	}

	/*
	 * Выборочно выбираем записи
	 *
	 * @return obj
	 */
	public function select()
	{

		$values = '';
		$i = 0;
		foreach ($this->props as $prop) {
			if($i == 0) {
				$values .= $prop;
			} else {
				$values .= ",".$prop;
			}
			$i++;
		}

		if($this->id) {

			$sql = "SELECT $values FROM $this->table WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();

			return $stmt;
		} else {
			$sql = "SELECT $values FROM $this->table";
			$stmt = $this->db->query($sql);

			return $stmt;
		}
	}

	/*
	 * Общий метод, для сохранения значений
	 */
	public function save()
	{

		$sql = "UPDATE $this->table SET bar = :bar WHERE id = :id";
		$statement = $this->db->prepare($sql);
		$statement->bindParam("bar", $this->bar);
		$statement->bindParam("id", $this->id);
		$statement->execute();

	}
}

$dbs = new ActiveR(new PDO("mysql:host=".$DBHost.";dbname=".$DBName, $DBLogin, $DBPass, $DBopt));

$dbs->table = "gp_users";
$dbs->props = ['id', 'login'];



echo "<pre>";

$users = $dbs->selectAll();
$usersNames = $dbs->select()->fetch();
print_r($usersNames);
print_r($dbs);