<?php
session_start();
$servername= "agenerick.com";
$username="kacper";
$password="829304kh";
$dbname="kacper";

$id_user = "";
$conn= new mysqli($servername,$username,$password,$dbname);
$sql="SELECT ID_user FROM Users WHERE login = '".$_POST["login"]."'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows == 1) {
    while($row=$result->fetch_assoc()){
        $id_user = $row["ID_user"];
    }
    $sql="INSERT INTO wypozyczenia (id_wypozyczenia, id_autor_tytul, data_wypozyczenia, data_oddania, ID_user) values (NULL, ".$_POST['ID'].", CURRENT_TIMESTAMP(), NULL, ".$id_user.")";
    mysqli_query($conn, $sql);

    $sql="UPDATE lib_aut_tyt SET dostepna = 0 WHERE id_autor_tytul = ".$_POST["ID"];
    mysqli_query($conn, $sql);
    header("Location:index.php");
}
else {
    echo("<p>zły login</p>");
    //zły login
}
?>