<?php
include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";

class UserController
{
private $requiredParameters = array('first_name', 'last_name', 'email', 'birthdate', 'phone', 'password');
	public function register($request)
	{
		$params = $request->get_params();
		if($this->isValid($params)){
		$user = new User($params["first_name"],
				 $params["last_name"],
				 $params["email"],
				$params["birthdate"],
				 $params["phone"],
				 $params["password"]);
			$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
			$conn = $db->getConnection();


	    return $conn->query($this->generateInsertQuery($user));
	}else{
		echo "Error 400: Bad Request";
	}
	}
	private function generateInsertQuery($user)
	{
		$query = "INSERT INTO user (first_name, last_name, email, birthdate, phone, pass) VALUES ('" . $user->getName() . "','" .
			$user->getLastName() . "','" .
			$user->getEmail() . "','" .
			$user->getBirthdate() . "','" .
			$user->getPhone() . "','" .
			$user->getPassword() . "')";
		return $query;
	}


	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT first_name, last_name, email, birthdate, phone FROM user WHERE ".$crit);
		//foreach($result as $row)
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	private function generateCriteria($params)
	{
		$criteria = "";
		foreach($params as $key => $value)
		{
			$criteria = $criteria.$key." LIKE '%".$value."%' OR ";
		}
		return substr($criteria, 0, -4);
	}
//DELETE ----------------------------------
	public function remove($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->prepare("DELETE FROM user WHERE first_name = ?");
		$result->bindParam(1, $params['first_name']);
		$result->execute();
		return $result;
	}

// UPDATE-----------------------------------------------

	public function update($request)
	{
		$params = $request->get_params();
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();
		return $conn->query($this->generateUpdateQuery($params));
	}
	private function generateUpdateQuery($params)
	{
		$crit = $this->generateUpdateCriteria($params);
		return "UPDATE user SET " . $crit . " WHERE id = '" . $params["id"] . "'";
	}
	private function generateUpdateCriteria($params)
	{
		$criteria = "";
		foreach ($params as $key => $value)
		{
			$criteria = $criteria.$key." = '".$value."' ,";
		}
		return substr($criteria, 0, -2);
	}

//isvalid ------------

	private function isValid($parameters)
	{
		$keys = array_keys($parameters);
		$diff1 = array_diff($keys, $this->requiredParameters);
		$diff2 = array_diff($this->requiredParameters, $keys);
		if (empty($diff2) && empty($diff1))
			return true;
		return false;
	}

}