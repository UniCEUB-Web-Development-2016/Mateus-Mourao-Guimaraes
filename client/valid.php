<?php

include_once "DatabaseConnector.php";

class isValid
{
    private $requiredParameters = array('first_name', 'last_name', 'email', 'birthdate', 'phone', 'password');

    public function register($request)
    {
        $params = $request->get_params();
        if ($this->isValid($params)) {
            $user = new User($params["first_name"],
                $params["last_name"],
                $params["email"],
                $params["birthdate"],
                $params["phone"],
                $params["password"]);
            $db = new DatabaseConnector("localhost", "TorrentMStreaming", "mysql", "", "root", "");
            $conn = $db->getConnection();


            return $conn->query($this->generateInsertQuery($user));
            header('Location: http://localhost:81/client/post01.php');
        } else {
            echo "Error 400: Bad Request";
        }
    }

    private function isValid($parameters)
    {
        $keys = array_keys($parameters);
        $diff1 = array_diff($keys, $this->requiredParameters);
        $diff2 = array_diff($this->requiredParameters, $keys);
        if (empty($diff2) && empty($diff1))
            return  true;
        return false;

    }

}
