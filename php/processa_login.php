<?php




$mysqli = new mysqli("mysql_db", "user", "password", "banking");

if ($mysqli->connect_errno) {
  // echo "Falha na conexão com o MySQL: " . $mysqli->connect_error;
  exit();
}


$username = $_GET['cpf'] ?? null;
$password = $_GET['password'] ?? null;

if ($username && $password) {
  header("Location: index.php");
}else{

}

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $mysqli->query($query);



if ($result->num_rows < 0) {
  // echo "Login realizado com sucesso!";
  // Redirecionar para dashboard etc



} else {
  // echo "Usuário ou senha inválidos!";
  
  exit;
}

header("Location: index.php");

?>