<?php
// Point to where you downloaded the phar
include('httpful.phar');
$url = "http://localhost:81/TorrentMStreaming/uploadtorrent/?first_name=".$_POST['first_name']."&gen=".$_POST['gen']."&quality=".$_POST['quality']."&sound_quality=".$_POST['sound_quality']."&resolution=".$_POST['resolution']."&upload_type=".$_POST['upload_type'];
$response = \Httpful\Request::post($url)->send();
if($response->body == 'false'){
    echo('Erro ao cadastrar');
}
else{
    header('Location: http://localhost:81/client/usuariopag/AlterarUsuario.php');
}
//header('Location: http://localhost:81/client/filmespag.html');


//http://localhost:81/TorrentMStreaming/uploadtorrent/
//?first_name=flash&gen=terror&quality=fullhd&sound_quality=dts5.1&resolution=1920x1080&upload_type=seriadoHD