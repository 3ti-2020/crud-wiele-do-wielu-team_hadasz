<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kacper Hadasz gr2</title>
    <link rel=stylesheet href="style.css">
</head>
<body>

<header></header>
<footer>

<form class="form" action="insert.php" method="POST">
    Podaj nazwisko:
    <input class="text" type="text" name="nazwisko"></br>
    Podaj tytuł:
    <input class="text" type="text" name="tytul"></br>
    <input class="button" type="submit" value="dodaj">



</footer>
<nav>


<?php

$servername= "agenerick.com";
$username="kacper";
$password="829304kh";
$dbname="kacper";

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT tytul, name FROM lib_autor, lib_tyt, lib_aut_tyt where lib_aut_tyt.id_autor=lib_autor.id_autor and lib_aut_tyt.id_tytul = lib_tyt.id_tytul  ");



echo("<table class='table'>");
echo("<tr>
<th>tytul</th>
<th>nazwisko</th>");




while($row=$result->fetch_assoc()){
    
    echo("<tr>");
    echo("<td>".$row['tytul']."</td>");
    echo("<td>".$row['name']."</td>");
    echo("</tr>");
}
    


echo("</table>");





?>


</nav>
    
</body>
</html>
