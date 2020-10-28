<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kacper Hadasz gr2</title>
    <link rel=stylesheet href="style.css">
</head>
<body>

<header>

    <h1 class="h">MOJA STRONA</H1>


</header>
<footer>

<form class="form" action="insert.php" method="POST">
    
    <input class="text" type="text" name="nazwisko" placeholder="nazwisko"></br>
    
    <input class="text" type="text" name="tytul" placeholder="tytul"></br>

    

    <input class="button" type="submit" value="Dodaj">



</footer>
<nav>


<?php

$servername= "agenerick.com";
$username="kacper";
$password="829304kh";
$dbname="kacper";

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT id_autor_tytul, name, tytul FROM lib_autor, lib_tyt, lib_aut_tyt where lib_aut_tyt.id_autor=lib_autor.id_autor and lib_aut_tyt.id_tytul = lib_tyt.id_tytul  ");



echo("<table class='table'>");
echo("<tr class='tr'>
<th class='th'>ID</th>
<th class='th'>Nazwisko</th>
<th class='th'>Tytul</th>
</tr>");




while($row=$result->fetch_assoc()){
    
    echo("<tr class='tr'>");
    echo("<td class='td'>".$row['id_autor_tytul']."</td>");
    echo("<td class='td'>".$row['name']."</td>");
    echo("<td class='td'>".$row['tytul']."</td>");
    echo("</tr>");
}
    


echo("</table>");





?>


</nav>
    
</body>
</html>
