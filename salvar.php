<?php

header("Content-type: text/html; charset=utf-8");
header("Location: index.html");
include_once("banco.php");

// Recebendo dados do form
$URL = addslashes($_POST['url']);

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO urls(url) VALUES ('$URL')";

// use exec() because no results are returned
$conn->exec($sql);
echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>