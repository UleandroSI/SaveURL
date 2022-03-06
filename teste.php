<?php
include_once("valida_campos.php");

$nome = addslashes($_POST['input_name']);
$email = addslashes($_POST['input_email']);
echo $nome;
?>
<br>
<?php
echo $email;
?>
<br>
<?php
/*$name_valido = valida_name($nome);
echo $name_valido;*/
?>
<br>
<?php
/*if (isset($_POST["check_email"])){
    echo "Checkbox ON";
} else{
    echo "Checkbox OFF";
} */
?>
<br>
<?php
$email_valido = valida_email($email);
echo "retorno email_valido: ".$email_valido."<br>";
if (empty($email_valido)) {
    echo"email branco";
} else{
    echo $email;
}
?>
<br>
<?php
echo "email da funçao: ";
echo $email_valido;
?>