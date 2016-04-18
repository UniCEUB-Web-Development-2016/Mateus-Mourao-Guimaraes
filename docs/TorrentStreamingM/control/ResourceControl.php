<?php
include_once "model/Request.php";
include_once "control/UserControl.php";
class ResourceControl
{
    private $controlMap =
        [
            "torrentcontrot" => "TorrentControl",
            "user" => "UserController",
            "loginControl" => "LoginControl",
        ];
    public function createResource($request)
    {
        return new $this->controlMap[$request->get_resource()];
	}
}