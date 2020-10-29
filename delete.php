"DELETE FROM `lib_aut_tyt` WHERE `lib_aut_tyt`.`id_autor_tytul` = 9"?

<?php

$servername= "agenerick.com";
$username="kacper";
$password="829304kh";
$dbname="kacper";

$conn = new mysqli($servername, $username, $password, $dbname);



$conn= new mysqli($servername,$username,$password,$dbname);

$sql="DELETE FROM `lib_aut_tyt` WHERE `lib_aut_tyt`.`id_autor_tytul` = '".$_POST['ID']."'";



mysqli_query($conn, $sql);

header("Location:index.php");