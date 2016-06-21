<?php
// Point to where you downloaded the phar
include('httpful.phar');
$url = "http://localhost:81/TorrentMStreaming/user/?first_name=".$_POST['first_name']."&last_name=".$_POST['last_name']."&email=".$_POST['email']."&birthdate=".$_POST['birthdate']."&phone=".$_POST['phone']."&password=".$_POST['password'];
$response = \Httpful\Request::post($url)->send();
header('Location: http://localhost:81/client/filmespag.html');

//  var_dump($response);
// And you're ready to go!
//$response = \Httpful\Request::get('http://localhost/request/user/?first_name=sorte')->send();
//$request_response = json_decode($response->body);
//foreach($request_response as $value)
//{
//	echo $value->first_name . '<br>';
//	echo '<div class="checkbox">
//         <label>
//            <input type="checkbox" value="remember-me"> Remember me
//         </label>
//        </div>';
//}