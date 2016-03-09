<?php
include "upload.php";
$upload = new Upload();
$name = $_POST[];
$sobrenome = $_POST[];
$email = $_POST[];
$senha = $_POST[];
$dtaNascimento = $_POST[];
$upload = new newUpload();
$user->setName($name);
$user->setSobrenome($sobrenome);
$user->setEmail($emailoucel);
$user->setSenha($senha);
$user->setdtaNascimento($dtaNascimento);
$user->createTextArquive();