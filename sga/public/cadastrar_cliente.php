<?php

$perfil = $_POST['perfil'];
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$data_nascimento = $_POST['data'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = sha1($_POST['senha']);
$profissao = $_POST['profissao'];

$dbtype     = "sqlite";
$dbhost     = "localhost";
$dbname     = "sga";
$dbuser     = "root";
$dbpass     = "root";
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);	 


$sql = "INSERT INTO usuario (Perfil_Id_Perfil,CPF,Nome,Endereco,Numero,Data_Nascimento,Sexo,Telefone,E_Mail,Senha,Profissao)
 VALUES (:Perfil_Id_Perfil,:CPF,:Nome,:Endereco,:Numero,:Data_Nascimento,:Sexo,:Telefone,:E_Mail,:Senha,:Profissao)";
$q = $conn->prepare($sql);
$executar = $q->execute(
		array(':Perfil_Id_Perfil'=>$perfil,':CPF'=>$cpf,':Nome'=>$nome,':Endereco'=>$endereco,
			':Numero'=>$numero,':Data_Nascimento'=>$data_nascimento,':Sexo'=>$sexo,':Telefone'=>$telefone,
			':E_Mail'=>$email,':Senha'=>$senha,':Profissao'=>$profissao));
if($executar){
	echo "Cadastrado com sucesso";
}
else{
	echo "Erro no cadastro";
}

?>