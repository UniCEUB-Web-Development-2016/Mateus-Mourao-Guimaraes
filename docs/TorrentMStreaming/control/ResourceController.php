<?php
include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/UploadtorrentController.php";
class ResourceController
{
	private $controlMap =
		[
			"cebola" => "CebolaController",
			"user" => "UserController",
			"product" => "ProductController",
			"uploadtorrent" => "UploadtorrentController",
		];
	public function createResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->register($request);
	}
	public function searchResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->search($request);
	}
	public function removeResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->remove($request);
	}
	public function updateResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->update($request);
	}
}