<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel=stylesheet href="style.css">
</head>
<body>

<header></header>
<footer></footer>
<nav>


<?php

$servername= "localhost";
$username="root";
$password="";
$dbname="książki";

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