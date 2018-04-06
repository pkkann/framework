<?php
class UsersModel extends BaseModel {

	public function getAll() {
		$sql = "
			SELECT
				`id`,
				`name`,
				`username`
			FROM
				`user`
			ORDER BY
				`name`
		";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function get($id) {
		$sql = "
			SELECT
				`id`,
				`name`,
				`username`
			FROM
				`user`
			WHERE
				`id` = :id
			LIMIT 1
		";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function create($name, $username, $password) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		$sql = "
			INSERT INTO
				`user`
			SET
				`name` = :name,
				`username` = :username,
				`password` = :password
		";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);
		$stmt->execute();
	}
	
	public function update($id, $name) {
		$sql = "
			UPDATE
				`user`
			SET
				`name` = :name
			WHERE
				`id` = :id
		";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":name", $name);
		$stmt->execute();
	}
	
}