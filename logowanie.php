<?php
    session_start();
    if (isset($_POST["login"])) {
        $conn = new mysqli("agenerick.com", "kacper", "829304kh", "kacper");
        $result = $conn->query("SELECT ID_user, login, haslo, admin FROM Users WHERE login = '".$_POST["login"]."' AND haslo = '".$_POST["haslo"]."';");
        if ($result->num_rows == 1) {
            while($row=$result->fetch_assoc()){
                $_SESSION["id_user"] = $row["ID_user"];
                $_SESSION["login"] = $row["login"];
                $_SESSION["isAdmin"] = $row["admin"];
                $_SESSION["logowanie"] = 1; // 1 oznacza zalogowany
            }
        }
        else {
            $_SESSION["logowanie"] = -1; // -1 oznacza błędne dane
        }
    }
    if (isset($_GET["wyloguj"])) {
        unset($_SESSION["logowanie"]);
        unset($_SESSION["id_user"]);
        unset($_SESSION["login"]);
        unset($_SESSION["isAdmin"]);
    }
    header("Location: index.php");
?>