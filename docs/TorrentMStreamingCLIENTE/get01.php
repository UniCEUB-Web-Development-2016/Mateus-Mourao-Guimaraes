<?php
// Point to where you downloaded the phar
include('httpful.phar');
$url = "http://localhost:81/TorrentMStreaming/user/?first_name=".$_POST['first_name']."&last_name=".$_POST['last_name']."&email=".$_POST['email']."&birthdate=".$_POST['birthdate']."&phone=".$_POST['phone']."&password=".$_POST['password'];
$response = \Httpful\Request::post($url)->send();
