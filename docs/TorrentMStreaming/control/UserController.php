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
	public function remove($request)
	{
		$params = $request->get_params();
		$db = new DBConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->prepare("DELETE FROM user WHERE first_name = ?");
		$result->bindParam(1, $params['first_name']);
		$result->execute();
		return $result;
	}



	public function update($request)
	{
		if(!empty($_GET["first_name"]) && !empty($_GET["last_name"]) && !empty($_GET["email"]) && !empty($_GET["birthdate"])&& !empty($_GET["phone"]) && !empty($_GET["password"]))
		{
			$first_name = addslashes(trim($_GET["first_name"]));
			$last_name = addslashes(trim($_GET["last_name"]));
			$email = addslashes(trim($_GET["email"]));
			$birthdate = addslashes(trim($_GET["birthdate"]));
			$phone = addslashes(trim($_GET["phone"]));
			$password = addslashes(trim($_GET["password"]));
			$params = $request->getParams();
			$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE user SET first_name=:first_name, last_name=:last_name, email=:email, birthdate=:birthdate, phone=:phone, password=:password WHERE email=:email");
			$result->bindValue(":name", $first_name);
			$result->bindValue(":cpf", $last_name);
			$result->bindValue(":email", $email);
			$result->bindValue(":birthdate", $birthdate);
			$result->bindValue(":phone", $phone);
			$result->bindValue(":password", $password);
			$result->execute();

			if ($result->rowCount() > 0){
				echo "Usuário alterado com sucesso!";
			} else {
				echo "Usuário não atualizado";
			}
		}
	}
}