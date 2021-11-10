<?php
if (isset($_POST['nome'])) {
    $data = "\n" . $_POST['matricula'] . ";" . $_POST['nome'] . ";" . $_POST['funcao'];

    $database = fopen("database.txt", "a") or die("Unable to open file!");

    echo fread($database,filesize("database.txt"));

    if (fwrite($database, $data) === false) {
        echo "Error ao cadastrar";
        exit;
    }

    fclose($database);

    header("Location: /av1-daw?cadastro=sucesso");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="cadastro.php" method="post">
    <h1>Cadastrar novo usuário</h1>
        <label for="nome">Nome<input type="text" name="nome" id="" required></label><br>
        <label for="matricula">Matrícula <input type="text" name="matricula" id="" required></label><br>
        <label for="funcao">Função<input type="text" name="funcao" id="" required></label>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
