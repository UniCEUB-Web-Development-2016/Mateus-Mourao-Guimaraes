
<?php
class upload{
	
	private $name;
	private $sobrenome;
	private $emailoucel;
	private $senha;
	private $dtaNascimento;
	
	public function setName($name){
	$this->name = name;
	}
	public function setSobrenome($sobrenome){
	$this->sobrenome = sobrenome;
	}
	public function setEmail($emailoucel){
	$this->emailoucel = emailoucel;
	}
	public function setSenha($senha){
	$this->senha = senha;
	}
	public function setbirthDate($dta){
	$this->dtaNascimento = dtaNascimento;
	}
	
	public function createTextArquive(){
	$arquive = fopen($name.'.txt','w');
	$fwrite($arquive, $name);
	$fwrite($arquive, $sobrenome);
	$fwrite($arquive, $emailoucel);
	$fwrite($arquive, $senha);
	$fwrite($arquive, $dtaNascimento);
	fclose($arquive);
	}
}