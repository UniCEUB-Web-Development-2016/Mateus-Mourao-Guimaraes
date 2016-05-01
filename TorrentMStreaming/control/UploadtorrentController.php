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

		$uploadtorrent = new Uploadtorrent($params["name"],
			$params["gen"],
			$params["quality"],
			$params["sound_quality"],
			$params["resolution"],
			$params["upload_type"]);
		$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
		$conn = $db->getConnection();
		
		//http://localhost:81/TorrentMStreaming/uploadtorrent/
		//?name=flash&gen=terror&quality=fullhd&sound_quality=dts5.1&resolution=1920x1080&upload_type=seriadoHD

		return $conn->query($this->generateInsertQuery($uploadtorrent));
	}
	private function generateInsertQuery($uploadtorrent)
	{
		$query =  "INSERT INTO uploadtorrent (name, gen, quality, sound_quality, resolution, upload) VALUES ('".$uploadtorrent->getName()."','".
			$uploadtorrent->getGen()."','".
			$uploadtorrent->getQuality()."','".
			$uploadtorrent->getSound_quality()."','".
			$uploadtorrent->getResolution()."','".
			$uploadtorrent->getUpload_type()."')";
		return $query;
	}
}