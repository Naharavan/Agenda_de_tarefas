<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém a data atual
$currentDate = date('Y-m-d');

// Seleciona as tarefas com data de aviso igual à data atual
$sql = "SELECT * FROM tarefas WHERE data_aviso = '$currentDate'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tarefa = $row['tarefa'];
        $email = $row['email'];

        // Envia o aviso por email
        $to = $email;
        $subject = "Aviso de Tarefa";
        $message = "Lembrete: A tarefa \"$tarefa\" deve ser concluída hoje!";
        $headers = "From: seu_email@seu_dominio.com" . "\r\n";

        // Use a função mail() para enviar o email
        mail($to, $subject, $message, $headers);

        echo "Aviso enviado para: $email<br>";
    }
} else {
    echo "Nenhum aviso a ser enviado hoje.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
