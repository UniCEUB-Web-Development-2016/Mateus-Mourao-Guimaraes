<?php
// Point to where you downloaded the phar
include('httpful.phar');


if(!empty ($_GET['email']) && !empty($_GET['password'])) {

    $url = \Httpful\Request::get("http://localhost:81/TorrentMStreaming/user/?email=" . $_GET['email'] . "&password=" . $_GET['password'])->send();
    $request_response = json_decode($response->body);
    session_start();


    $_SESSION['email'] = json_encode($request_response);
    $_SESSION['password'] = json_encode($request_response);


    header('Location: http://localhost:81/client/filmespag.html');


}    else{


    header('Location: http://localhost:81/client/error.html');


}