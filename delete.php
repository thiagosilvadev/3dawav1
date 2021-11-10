<?php 

if(isset($_POST['id'])) {

    $database = fopen("database.txt", "r");

    $users = [];
    while (!feof($database)) {
        $user = fgets($database);

        $users[] = $user;

    }
    fclose($database);

    $database = fopen("database.txt", "w");
    foreach ($users as $index => $user) {
        if($index !== intval($_POST['id'])){   
            fwrite($database, $user);
        }
        
    }
    fclose($database);
    header("Location: /av1-daw?sucesso");
} else {
    header("Location: /av1-daw");
}


?>