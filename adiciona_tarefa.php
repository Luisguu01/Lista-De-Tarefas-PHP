<?php
include 'conexao.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO tarefas (titulo, descricao) VALUES ('$titulo', '$descricao')";

if ($conn->query($sql) === TRUE) {
    echo "Nova tarefa adicionada com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.php");
exit();
?>
