<?php
include("Cabecalho.php");

include('httpful.phar');

$response = \Httpful\Request::get("http://localhost:81/TorrentMStreaming/user/?first_name=".isset($_GET['first_name']))->send();
$request_response = json_decode($response->body);
$contents = $response->body;
$contents = utf8_encode($contents);
$contents = substr($contents, 23, -1); //retira o connect da string e o ultimo caractere
$request_response = json_decode($contents);

foreach(array($request_response) as $value)
{
    $first_name=isset($value->first_name);
}
foreach(array($request_response) as $value)
{
    $last_name=isset($value->last_name);
}
foreach(array($request_response) as $value)
{
    $email=isset($value->email);
}

foreach(array($request_response) as $value)
{
    $Birtdate=isset($value->Birthdate);
}

foreach(array($request_response) as $value)
{
    $phone=isset($value->phone);
}
foreach(array($request_response) as $value)
{
    $password=isset($value->password);
}


?>

<h1>Altere os dados :</h1>
<form action="AlterarInserir.php" method="post">
    <table class="table">
        <tr>
            <td>Nome:</td>
            <td><input Placeholder="Insira o nome " class="form-control" type="text" value="<?php echo $first_name?>" name="first_name"></td>
        </tr>
        <tr>
            <td>LastName</td>
            <td><input Placeholder="Insira o lastname " class="form-control" name="last_name" value="<?php echo $last_name?>"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input  Placeholder="Insira o Email " class="form-control" type="email" name="email"  value="<?php echo $email?>"></td>
        </tr>
        <tr>
            <td>BirthDate:</td>
            <td><input  Placeholder="Insira o birthdate " type="date" class="form-control"  name="birthdate"  value="<?php echo $Birtdate?>"></td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td> <input Placeholder="Insira o telefone " class="form-control" type="text"
                        name="phone" onKeyPress="MascaraTelefone(form1.telefone);"
                        maxlength="14" onBlur="ValidaTelefone(form1.telefone);" value="<?php echo $phone?>"></td>
        </tr>

        <tr>
            <td>Pass:</td>
            <td><input  Placeholder="Insira o password " class="form-control"  name="password"  type="password"  value="<?php echo $password?>"></td>
        </tr>

        <tr>
            <td>

                <button class="btn btn-primary" type="submit"/>Atualizar</button>
            </td>
        </tr>
    </table>
</form>