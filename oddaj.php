<?php
session_start();
$servername= "agenerick.com";
$username="kacper";
$password="829304kh";
$dbname="kacper";

$conn= new mysqli($servername,$username,$password,$dbname);
$sql="UPDATE wypozyczenia SET data_oddania = CURRENT_TIMESTAMP() WHERE id_autor_tytul = ".$_POST["ID"];
mysqli_query($conn, $sql);

$sql="UPDATE lib_aut_tyt SET dostepna = 1 WHERE id_autor_tytul = ".$_POST["ID"];
mysqli_query($conn, $sql);
header("Location:index.php");

?>