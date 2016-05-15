<?php
include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";

class UserController
{
	public function register($request)
	{
		$params = $request->get_params();
		$user = new User($params["first_name"],
			$params["last_name"],
			$params["email"],
			$params["birthdate"],
			$params["phone"],
			$params["password"]);
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();

		//	http://localhost:81/TorrentMStreaming/user/?first_name=Mateus&last_name=Mourao&
		//birthdate=1991-09-20&email=aladornxd@gmail.com&phone=81675250&password=restDOcAo123

		return $conn->query($this->generateInsertQuery($user));
	}
	private function generateInsertQuery($user)
	{
		$query =  "INSERT INTO user (first_name, last_name, email, birthdate, phone, pass) VALUES ('".$user->getName()."','".
			$user->getLastName()."','".
			$user->getEmail()."','".
			$user->getBirthdate()."','".
			$user->getPhone()."','".
			$user->getPassword()."')";
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
	private function validateParameters($parameters){
		foreach ($this->requiredParameters as $key) {
			if(!$this->isIn($key,$parameters)){
				throw new Exception("Error! Parameter '$key' is missing in your request!", 1);
			}
		}
	}
	private function isIn($prm,$array){
		foreach ($array as $key2 => $value) {
			if ($key2 == $prm){
				return true;
			}
		}
		return false;
	}
}