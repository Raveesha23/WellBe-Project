<?php
class Database
{
	private function connect()
	{
		$string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
		$con = new PDO($string, DBUSER, DBPASS);
		return $con;
	}
	public function query($query, $data = [])
	{
		try {
			$con = $this->connect();
			$stm = $con->prepare($query);

			$check = $stm->execute($data);

			// Check if this is a SELECT query
			if (stripos(trim($query), 'SELECT') === 0) {
				// Fetch results for SELECT queries
				$result = $stm->fetchAll(PDO::FETCH_OBJ);
				return is_array($result) && count($result) ? $result : [];
			}
		}
		return false;
	}
	public function get_row($query, $data = [])
	{
		$con = $this->connect();
		$stm = $con->prepare($query);
		$check = $stm->execute($data);
		if ($check) {
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if (is_array($result) && count($result)) {
				return $result[0];
			}
		}
		return false;
	}

	public function readn($query, $data = [])
	{
		$con = $this->connect();
		$stmt = $con->prepare($query);
		$stmt->execute($data);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	// Method to execute read queries (select)
	public function read($query, $params = [])
	{
		$conn = $this->connect();
		$stmt = $conn->prepare($query);
		$stmt->execute($params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Method to execute write queries (insert, update, delete)
	public function write($query, $params = [])
	{
		$conn = $this->connect();
		$stmt = $conn->prepare($query);
		return $stmt->execute($params);
	}
}
