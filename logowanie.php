<?php
    session_start();
    if (isset($_POST["login"])) {
        if ($_POST["login"] == "admin" && $_POST["haslo"] == "1234") {
            $_SESSION["logowanie"] = 1; // 1 oznacza zalogowany
        }
        else {
            $_SESSION["logowanie"] = -1; // -1 oznacza błędne dane
        }
    }
    if (isset($_GET["wyloguj"])) {
        unset($_SESSION["logowanie"]);
    }
    header("Location: index.php");
?>