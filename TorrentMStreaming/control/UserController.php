<?php
include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";
class UserController
{
	public function register($request)
	{
		$params = $request->get_params();
		$user = new User($params["name"],
			$params["last_name"],
			$params["email"],
			$params["birthdate"],
			$params["phone"],
			$params["password"]);
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();

		//	http://localhost:81/TorrentMStreaming/user/?name=Mateus&last_name=Mourao&
		//birthdate=1991-09-20&email=aladornxd@gmail.com&phone=81675250&password=restDOcAo123

		return $conn->query($this->generateInsertQuery($user));
	}
	private function generateInsertQuery($user)
	{
		$query =  "INSERT INTO user (name, last_name, email, birthdate, phone, pass) VALUES ('".$user->getName()."','".
			$user->getLastName()."','".
			$user->getEmail()."','".
			$user->getBirthdate()."','".
			$user->getPhone()."','".
			$user->getPassword()."')";
		return $query;
	}
}