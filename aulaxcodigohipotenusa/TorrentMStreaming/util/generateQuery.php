<?php
class queryGenerator
{

    public function insertUser($obj, $cnn)
    {
        $cnn->query("INSERT INTO user(first_name, last_name, email, birthDate, phone, password)
					VALUES(
					'{$obj->getFirst_name()}',
					'{$obj->getLast_name()}',
					'{$obj->getEmail()}',
			    	'{$obj->getBirthdate()}',
					'{$obj->getPhone()}',
					'{$obj->getPassword()}',
					'null');"
        );
    }

    public function searchUser($request, $cnn)
    {
        return ($cnn->query("SELECT `firstName`, `lastName`, `email`, `birthDate`, `phone`, `password` FROM user WHERE
                " . $this->generateCriteria($request->getParameters()))->fetchAll(PDO::FETCH_ASSOC));
    }

    private function generateCriteriaUser($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
        }
        return substr($criteria, 0, -4);
    }

    public function insertUploadtorrent($obj, $cnn)
    {
        $cnn->query("INSERT INTO uploadtorrent(first_name, gen, quality, sound_quality, resolution, upload)
					VALUES(
					'{$obj->getFirst_name()}',
					'{$obj->getGen()}',
					'{$obj->getQuality()}',
			    	'{$obj->getSound_Quality()}',
					'{$obj->getResolution()}',
					'{$obj->getUpload()}',
					'null');"
        );
    }

    public function searchUploadtorrent($request, $cnn)
    {
        return ($cnn->query("SELECT `firstName`, `gen`, `quality`, `sound_quality`, `resolution`, `ipload` FROM uploadtorrent WHERE
                " . $this->generateCriteria($request->getParameters()))->fetchAll(PDO::FETCH_ASSOC));
    }

    private function generateCriteriaUpload($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
        }
        return substr($criteria, 0, -4);
    }
}