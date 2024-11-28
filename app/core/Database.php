<?php

class Database
{

	private function connect()
	{
		$string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
		$con = new PDO($string, DBUSER, DBPASS);
		return $con;
	}

	// public function query($query, $data = [])
	// {

	// 	$con = $this->connect();
	// 	$stm = $con->prepare($query);

	// 	$check = $stm->execute($data);
	// 	if($check)
	// 	{
	// 		$result = $stm->fetchAll(PDO::FETCH_OBJ);
	// 		if(is_array($result) && count($result))
	// 		{
	// 			return $result;
	// 		}
	// 	}

	// 	return false;
	// }

	public function query($query, $data = [])
	{
		try {
			$con = $this->connect();
			$stm = $con->prepare($query);

			$check = $stm->execute($data);

<<<<<<< HEAD
		$check = $stm->execute($data);
		if ($check) {
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if (is_array($result) && count($result)) {
				return $result;
=======
			// Check if this is a SELECT query
			if (stripos(trim($query), 'SELECT') === 0) {
				// Fetch results for SELECT queries
				$result = $stm->fetchAll(PDO::FETCH_OBJ);
				return is_array($result) && count($result) ? $result : [];
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b
			}

			// For non-SELECT queries (INSERT/UPDATE/DELETE), return true if executed successfully
			return $check;

		} catch (PDOException $e) {
			// Log the error for debugging
			error_log("Database Query Failed: " . $e->getMessage());
			return false;
		}
	}

<<<<<<< HEAD
	public function get_row($query, $data = [])
=======

    public function get_row($query, $data = [])
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b
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

<<<<<<< HEAD
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
=======
	public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            $type = PDO::PARAM_STR;
        }
        $this->stmt->bindValue($param, $value, $type);
    }

>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b
}
