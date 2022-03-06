<?php

header("Content-type: text/html; charset=utf-8");
header("Location: inserir.html");
include_once("banco.php");
include_once("valida_campos.php");

// Recebendo dados do form
$nome = addslashes($_POST['input_name']);
$email = addslashes($_POST['input_email']);

$name_valido = valida_name($nome);
if (empty($name_valido)) {
    if (isset($_POST['check_email'])) {
        $email_valido = valida_email($email);
        echo "Saida depois retorno email_valido: ". $email_valido. "<br>";
        if (empty($email_valido)) {
            $endereco = sha1($nome.$email);
            try {
                // Create connection
                $conn = new mysqli($host, $user, $password, $database);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "INSERT INTO cadastro(nome, link) VALUES ('$nome', '$endereco')";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    
                $conn->close();
             
            } catch (Exception $e){
                // roll back a transação se tiver algum erro
                $conn->rollback();
            }
        } else {echo "Erro email vazio <br>";}
    } else {
        $endereco = sha1($nome.$email);
        try {
            // Create connection
            $conn = new mysqli($host, $user, $password, $database);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "INSERT INTO cadastro(nome, link) VALUES ('$nome', '$endereco')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
            $conn->close();
            
        } catch (Exception $e){
            // roll back a transação se tiver algum erro
            $conn->rollback();
        }
    }
} else {echo "Erro nome";}

?>
