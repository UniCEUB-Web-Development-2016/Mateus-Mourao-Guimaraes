<?php
// Point to where you downloaded the phar
include('httpful.phar');
include("Cabecalho.php");
// And you're ready to go!
$response = \Httpful\Request::get("http://localhost:81/torrentMStreaming/uploadtorrent/?first_name=".$_GET['first_name'])->send();
$request_response = json_decode($response->body);
if($request_response==null){
    echo 'Movie não existe!';
}else{
    ?><h1>Resultados</h1><?php
    foreach($request_response as $value)
    {
        ?><a class="list-group-item">Nome do video: <?php echo $value->first_name . '<br>';
    }?></a>

    <?php
    foreach($request_response as $value)
    {
        ?><a class="list-group-item">Genero: <?php echo $value->gen . '<br>';
    }?></a>
    <?php
    foreach($request_response as $value)
    {
        ?><a class="list-group-item">Qualidade: <?php echo $value->quality . '<br>';
    }?></a>
    <?php
    foreach($request_response as $value)
    {
        ?><a class="list-group-item">Sound Quality: <?php echo $value->sound_quality . '<br>';
    }?></a>
    <?php
    foreach($request_response as $value)
    {
        ?><a class="list-group-item">Resolucao: <?php echo $value->resolution . '<br>';
    }?></a>
    <?php
    foreach($request_response as $value)
    {
        ?><a class="list-group-item">upload: <?php echo $value->upload . '<br>';
    }?></a>
    <?php
    foreach($request_response as $value)
    {
        ?><a class="list-group-item">Review: <?php echo $value->review . '<br>';
    }
}?></a></p>

<?php include("rodape.php");?>