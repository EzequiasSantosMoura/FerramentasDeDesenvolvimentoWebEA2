<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <?php

        if (!isset($_SESSION['login'])) {
            
            if (isset($_POST['action'])) {
                $login = 'ezequias';
                $senha = '123456';

                $loginForm = $_POST['user'];
                $senhaForm = $_POST['senha'];

                if ($login == $loginForm && $senha == $senhaForm) {
                    //succesful
                    $_SESSION['login'] = $login;
                    header('Location: index.php');

                } else {
                    //error
                    echo 'Dados inválidos.';
                }

            }
            
            include('./login.php');
        } else {

            if (isset($_GET['logout'])) {
                unset($_SESSION['login']);
                session_destroy();
                header('Location: index.php');

            }

            include('./home.php');
        }
    ?>

</body>
</html>