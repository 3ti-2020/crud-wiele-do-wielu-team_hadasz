<?php
session_start();
$servername= "agenerick.com";
$username="kacper";
$password="829304kh";
$dbname="kacper";

$conn= new mysqli($servername,$username,$password,$dbname);
$sql="INSERT INTO wypozyczenia (id_wypozyczenia, id_autor_tytul, data_wypozyczenia, data_oddania, ID_user) values (NULL, ".$_POST['ID'].", CURRENT_TIMESTAMP(), NULL, ".$_SESSION["id_user"].")";
mysqli_query($conn, $sql);

$sql="UPDATE lib_aut_tyt SET dostepna = 0 WHERE id_autor_tytul = ".$_POST["ID"];
mysqli_query($conn, $sql);
header("Location:index.php");

?>