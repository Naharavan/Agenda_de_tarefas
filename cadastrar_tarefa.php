<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Agenda";

// Dados do formulário
$tarefa = $_POST['tarefa'];
$dataConclusao = $_POST['data_conclusao'];
$dataAviso = $_POST['data_aviso'];
$email = $_POST['email'];

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Insere os dados no banco de dados
$sql = "INSERT INTO tarefas (tarefa, data_conclusao, data_aviso, email) VALUES ('$tarefa', '$dataConclusao', '$dataAviso', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Tarefa cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar a tarefa: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
