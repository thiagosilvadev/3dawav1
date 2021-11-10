
<?php 
$id = $_POST['id'];
if(isset($_POST['nome']) && isset($_POST['matricula'])) {

    $database = fopen("database.txt", "r");

    $users = [];
    while (!feof($database)) {
        $user = fgets($database);

        $users[] = $user;

    }
    fclose($database);

    $database = fopen("database.txt", "w");
    foreach ($users as $index => $user) {
        if($index == intval($id)){  
            $user = $_POST['matricula'] . ";" . $_POST['nome'] . ";" . $_POST['funcao'];
            fwrite($database, $user);
        } else {
            fwrite($database, $user);
        }
        
    }
    fclose($database);
    header("Location: /av1-daw?sucesso");
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
    <form action="edit.php" method="post">
    <h1>Editar usuário</h1>
        <label for="nome">Nome<input type="text" name="nome" id="" required></label><br>
        <label for="matricula">Matrícula <input type="text" name="matricula" id="" required></label><br>
        <label for="funcao">Função<input type="text" name="funcao" id="" required></label>
        <button type="submit">Editar</button>
    </form>
</body>
</html>