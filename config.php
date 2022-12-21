<?php

$servername = "localhost";
$username = "root";
$password = "";
$table = "employees";

try{
    $db = new PDO ("mysql:host = $servername;dbname=crud_database",$username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "";

}catch(PDOExeption $e){
echo $sql . "<br>" . $e->getMessage();
}

?>