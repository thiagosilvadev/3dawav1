<?php
$database = fopen("database.txt", "r");


$users = [];
while (!feof($database)) {
    $user = fgets($database);

    $user = explode(";", $user);


    $users[] = [
        'matricula' => $user[0],
        'nome' => $user[1],
        'funcao' => $user[2],
    ];

}
fclose($database);



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
    <?php
if (isset($_GET['cadastro'])) {
    ?>
           <h1>Cadastro feito com sucesso</h1>
      <?php }
?>
     <h1>Listagem de usuários</h1>
     <a href="cadastro.php" class="button">Cadastrar usuário</a>
    <table>
    <thead>

        <th>Matricula</th>
        <th>Nome</th>
        <th>Função</th>
        <th>Deletar</th>
        <th>Editar</th>

    </thead>
    <tbody>

        <?php
            foreach($users as $index => $user) {
                ?>
                <tr>
      
                    <td><?php echo $user['matricula']?></td>
                    <td><?php echo $user['nome']?></td>
                    <td><?php echo $user['funcao']?></td>
                    <td>
                        <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $index?>">
                        <button type="submit">Deletar</button>
                        </form>
                      </td>
                    <td> 
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $index?>">
                        <button type="submit">Editar</button>
                        </form>
                    </td>
         
                </tr>
           


            <?php 
            };
            ?>
    </tbody>


    </table>


</body>
</html>