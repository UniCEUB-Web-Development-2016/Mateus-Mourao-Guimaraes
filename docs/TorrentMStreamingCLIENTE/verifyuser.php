<?php
// Point to where you downloaded the phar
include('httpful.phar');
if(!empty($_GET['email']) && !empty($_GET['password'])){
    session_start();

    $resposta = \Httpful\Request::get("http://localhost:81/TorrentMStreaming/user/?email=".$_GET['email']."&password=".$_GET['password'])->send();
    //var_dump($resposta);
    $resouse = json_decode($resposta->body);
    $_SESSION["user"] = json_encode($resouse);
    header('Location: http://localhost:81/client/filmespag.html');
}