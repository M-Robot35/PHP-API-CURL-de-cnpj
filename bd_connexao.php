<?php

$root = "localhost";
$user= "root";
$pass= "";
$db_name= "usuarios";
$port= "3306";


$conn = new PDO("mysql:root=$root;dbname=". $db_name, $user , $pass);

$query = "INSERT INTO usuarios(nome, senha, email, db_create) VALUES(:nome, :senha, :email, NOW())";

$usuario_connect = $conn->prepare($query);
$usuario_connect->bindParam(":nome", $_POST['nome']);
$usuario_connect->bindParam(":senha", $_POST['senha']);
$usuario_connect->bindParam(":email", $_POST['email']);
$usuario_connect->execute();

if($usuario_connect->rowCount()){
    echo "<p style='color:green'>Usuario cadastrado com Sucesso</p>";
}else{
    echo "<p style='color:red'>Usuario Não cadastrado</p>";
}


