<?php
session_start();
$servername= "agenerick.com";
$username="kacper";
$password="829304kh";
$dbname="kacper";

$conn= new mysqli($servername,$username,$password,$dbname);

$sqlGetId = "SELECT LAST_INSERT_ID()";

$sql=" INSERT INTO lib_autor (id_autor, name) values (NULL, '".$_POST['nazwisko']."') ";
mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sqlGetId);
while ($row = $result->fetch_assoc()) {
    $autorId = $row["LAST_INSERT_ID()"];
}

$sql=" INSERT INTO lib_tyt (id_tytul, tytul) values (NULL, '".$_POST['tytul']."') ";
mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sqlGetId);
while ($row = $result->fetch_assoc()) {
    $tytulId = $row["LAST_INSERT_ID()"];
}

$sql=" INSERT INTO lib_aut_tyt (id_autor_tytul, id_autor,id_tytul,dostepna) values (NULL, $autorId, $tytulId,1)";

mysqli_query($conn, $sql);

header("Location:index.php");

?>