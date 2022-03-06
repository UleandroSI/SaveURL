<?php

function valida_name($self){
    // define variables and set to empty values
    $nameErr = "";
    $name = $self;
        if (empty($name)) {
            $nameErr = "Nome é obrigatório";
    }   else {
            $input_name = test_input($name);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Somente letras e espaço são permitidos.";
            }
        }
    return $nameErr;
}

function valida_email($self){
    //define variables
    $emailErr = "";

    if (empty($self)) {
        $emailErr = "Email é requerido";
    }   else {
            $email = test_input($self);

            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Formato de email inválido.";
            }
        }
    return $emailErr;
}

function validar_url($self){
    //declara variaveis
    $websiteErr = "";

    if (empty($self)) {
        $websiteErr = "URL em branco";
    }   else {
            $website = test_input($self);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                echo "Erro com url";
                $websiteErr = "URL inválida";
            }
        }
    return $websiteErr;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
