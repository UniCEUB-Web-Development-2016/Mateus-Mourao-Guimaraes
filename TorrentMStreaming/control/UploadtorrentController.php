<?php
include_once "model/Request.php";
include_once "model/Uploadtorrent.php";
include_once "database/DatabaseConnector.php";

class UploadtorrentController
{
	/**
	 * @param $request
	 * @return PDOStatement
	 */
	public function register($request)
	{
		$params = $request->get_params();

		$uploadtorrent = new Uploadtorrent($params["first_name"],
			$params["gen"],
			$params["quality"],
			$params["sound_quality"],
			$params["resolution"],
			$params["upload_type"]);
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();

		//http://localhost:81/TorrentMStreaming/uploadtorrent/
		//?first_name=flash&gen=terror&quality=fullhd&sound_quality=dts5.1&resolution=1920x1080&upload_type=seriadoHD

		return $conn->query($this->generateInsertQuery($uploadtorrent));
	}

	private function generateInsertQuery($uploadtorrent)
	{
		$query = "INSERT INTO uploadtorrent (first_name, gen, quality, sound_quality, resolution, upload) VALUES ('" . $uploadtorrent->getName() . "','" .
			$uploadtorrent->getGen() . "','" .
			$uploadtorrent->getQuality() . "','" .
			$uploadtorrent->getSound_quality() . "','" .
			$uploadtorrent->getResolution() . "','" .
			$uploadtorrent->getUpload_type() . "')";
		return $query;
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT first_name, gen, quality, sound_quality, resolution, upload FROM uploadtorrent WHERE " . $crit);
		//foreach($result as $row)
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	private function generateCriteria($params)
	{
		$criteria = "";
		foreach ($params as $key => $value) {
			$criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
		}
		return substr($criteria, 0, -4);
	}

	public function remove($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->prepare("DELETE FROM uploadtorrent WHERE first_name = ?");
		$result->bindParam(1, $params['first_name']);
		$result->execute();
		return $result;
	}

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
		return "UPDATE uploadtorrent SET " . $crit . " WHERE id = '" . $params["id"] . "'";
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

}