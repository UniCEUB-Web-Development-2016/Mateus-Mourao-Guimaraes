<?php
include_once "DatabaseConnector.php";
$db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
$conn = $db->getConnection();

if (!$conn){
    die("Database Connection Failed" . mysql_error());
}
