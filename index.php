<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h1 class="text-center">Cadastro de Tarefas</h1>
        <form action="adiciona_tarefa.php" method="POST" class="mt-4">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Adicionar Tarefa</button>
        </form>
        <h2 class="mt-5">Lista de Tarefas</h2>
        <ul class="list-group mt-3">
            <?php
                include 'conexao.php';
                $sql = "SELECT * FROM tarefas ORDER BY data_criacao DESC";
                $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<li class="list-group-item">';
                        echo '<h5>' . $row["titulo"] . '</h5>';
                        echo '<p>' . $row["descricao"] . '</p>';
                        echo '<small>' . $row["data_criacao"] . '</small>';
                        echo '</li>';
                    }
                } else {
                    echo '<li class="list-group-item">Nenhuma tarefa encontrada.</li>';
                }

                $conn->close();
            ?>
        </ul>
</body>
</html>