<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kacper Hadasz gr2</title>
    <link rel=stylesheet href="style.css">
</head>
<body>
<?php session_start();
if(isset($_SESSION["logowanie"]) && $_SESSION["logowanie"] == 1) $isLoggedIn = true;
else $isLoggedIn = false;?>
<header>

<div class="buttons">
    <?php if ($isLoggedIn == true) echo "<a class='button' href='secret.php'>Super Tajna Strona</a>" ?>
</div>

<div class="h1">  <h1 class="h">MOJA STRONA</H1> </div>

<div class="buttons">
    <a class="button" href="karty.html">Karty</a>
</div>
<div >
    <a class="git" href="https://github.com/3ti-2020/crud-wiele-do-wielu-team_hadasz"><img class="git" src="https://www.flaticon.com/svg/static/icons/svg/25/25231.svg" width="50px"></a>
</div>
</header>
<footer>
<?php if($isLoggedIn && $_SESSION["isAdmin"] == 1 ) echo('<h1 class="ha">Dodaj Książkę</h1> 
<form class="form" action="insert.php" method="POST">
    <input class="text" type="text" name="nazwisko" placeholder="nazwisko"></br>
    <input class="text" type="text" name="tytul" placeholder="tytul"></br>
    <input class="button" type="submit" value="Dodaj">
</form>');
?>

</footer>

<main>
<?php if($isLoggedIn) {
    echo "<p>Witaj, ".$_SESSION["login"]."</p>";
} ?>
<h1 class="ha">Logowanie</h1>
<p class="dane">
    login: admin </br>
    hasło: 1234 </p>

<?php
if (isset($_SESSION["logowanie"]) && $_SESSION["logowanie"] == -1) {
    echo "<p class='alert'>Błędne dane logowania</p>";
    unset($_SESSION["logowanie"]);
}
if ($isLoggedIn) {
    echo "<div class='buttons'><a class='button' href='logowanie.php?wyloguj=1'>Wyloguj</a></div>";
}
else {
    echo "<form class='form' action='logowanie.php' method='POST'>
    <input class='text' type='text' name='login' placeholder='Login'></br>
    <input class='text' type='password' name='haslo' placeholder='haslo'></br>
    <input class='button' type='submit' value='zaloguj'>
    </form>";
}
?>
</main>
<nav>
<?php if($isLoggedIn && $_SESSION["isAdmin"] == 1) echo('<span>Podaj login wypożyczającego i kliknij wypożycz: <input type="text" class="login_input text"></span>'); ?>
<br/>
<?php

$servername= "agenerick.com";
$username="kacper";
$password="829304kh";
$dbname="kacper";

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT id_autor_tytul, name, tytul FROM lib_autor, lib_tyt, lib_aut_tyt where lib_aut_tyt.id_autor=lib_autor.id_autor and lib_aut_tyt.id_tytul = lib_tyt.id_tytul and dostepna = 1");

echo("<table class='table'>");
echo("<tr class='tr'>
<th class='th'>ID</th>
<th class='th'>Nazwisko</th>
<th class='th'>Tytul</th>");
if($isLoggedIn && $_SESSION["isAdmin"] == 1) {
    echo("<th class='th'>Usuń</th>");
    echo("<th class='th'>Wypożycz</th>");
}
echo("</tr>");

while($row=$result->fetch_assoc()){
    
    echo("<tr class='tr'>");
    echo("<td class='td'>".$row['id_autor_tytul']."</td>");
    echo("<td class='td'>".$row['name']."</td>");
    echo("<td class='td'>".$row['tytul']."</td>");
    if($isLoggedIn && $_SESSION["isAdmin"] == 1){
        echo("<td class='td'>  <form class='form' action='delete.php' method='POST'>
        <input class='text' type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'>
        <input class='buttona' type='submit' value='Usun'></form></td>");
        echo("<td class='td'>  <form class='form' action='wypozycz.php' method='POST'>
        <input class='text' type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'>
        <input class='text login_hidden' type='hidden' name='login'>
        <input class='buttona' type='submit' value='Wypożycz'></form></td>");
    }
    echo("</tr>");
}
echo("</table><br/>");

if($isLoggedIn) {
    if($_SESSION["isAdmin"] == 1) {
        $result = $conn->query("SELECT lib_aut_tyt.id_autor_tytul, name, tytul, Users.login FROM lib_autor, lib_tyt, lib_aut_tyt, wypozyczenia, Users where lib_aut_tyt.id_autor=lib_autor.id_autor and lib_aut_tyt.id_tytul = lib_tyt.id_tytul and lib_aut_tyt.id_autor_tytul = wypozyczenia.id_autor_tytul and wypozyczenia.ID_user = Users.ID_user and data_oddania is NULL and dostepna = 0");
    }
    else {
        $result = $conn->query("SELECT lib_aut_tyt.id_autor_tytul, data_wypozyczenia, data_oddania, name, tytul, ID_user FROM lib_autor, lib_tyt, lib_aut_tyt, wypozyczenia where lib_aut_tyt.id_autor=lib_autor.id_autor and lib_aut_tyt.id_tytul = lib_tyt.id_tytul and lib_aut_tyt.id_autor_tytul = wypozyczenia.id_autor_tytul and ID_user = ".$_SESSION["id_user"]);
    }

    echo("<table class='table'>");
    echo("<tr class='tr'>
    <th class='th'>ID</th>
    <th class='th'>Nazwisko</th>
    <th class='th'>Tytul</th>");
    if($_SESSION["isAdmin"] == 1) {
        echo("<th class='th'>Wypożyczający</th>");
        echo("<th class='th'>Usuń</th>");
        echo("<th class='th'>Oddaj</th>");
    }
    else {
        echo("<th class='th'>Termin</th>");
    }
    echo("</tr>");
    if ($result->num_rows != 0) {
        while($row=$result->fetch_assoc()){
            
            echo("<tr class='tr'>");
            echo("<td class='td'>".$row['id_autor_tytul']."</td>");
            echo("<td class='td'>".$row['name']."</td>");
            echo("<td class='td'>".$row['tytul']."</td>");
            if($_SESSION["isAdmin"] == 1){
                echo("<td class='td'>".$row["login"]."</td>");
                echo("<td class='td'>  <form class='form' action='delete.php' method='POST'>
                <input class='text' type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'></br>
                <input class='buttona' type='submit' value='Usun'></form></td>");
                echo("<td class='td'>  <form class='form' action='oddaj.php' method='POST'>
                <input class='text' type='hidden' name='ID' value='$row[id_autor_tytul]' placeholder='ID'></br>
                <input class='buttona' type='submit' value='Oddaj'></form></td>");
            }
            else {
                if ($row["data_oddania"] == NULL) {
                    $timestamp = strtotime($row["data_wypozyczenia"]);
                    $termin = 30 * 86400;
                    $data = date("d.m.Y", $timestamp + $termin);

                    echo("<td class='td'>".$data."</td>");
                }
                else {
                    echo("<td class='td'>Oddano</td>");
                }
            }
            echo("</tr>");
        }
    }
    echo("</table>");
}
?>

</nav>
<script src="script.js"></script>
</body>
</html>