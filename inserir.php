<?php
header("Content-type: text/html; charset=utf-8");
//header("Location: inserir.html");
include_once("banco.php");
include_once("valida_campos.php");

$url = addslashes($_POST['input_url']);
$ID = 6;
$url_valida = validar_url($url);
if (empty($url_valida)){
    try {
        // Create connection
        $conn = new mysqli($host, $user, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sql = "INSERT INTO dados(ID,urls) VALUES ('$ID', $url')";
            $select = "SELECT dados FROM dados WHERE ID=$ID";
            echo "Select: <br>";
            echo $select;

            if ($conn->query($sql) === TRUE) {
                echo "URL salva com sucesso.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            if ($conn->query($select) === TRUE) {
                $result = $conn->query($select);
                echo $result;
            } else {
                echo "Error: " . $select . "<br>" . $conn->error;
                }
                
            $conn->close();

        }
     
    } catch (Exception $e){
        // roll back a transação se tiver algum erro
        $conn->rollback();
    }
} else{
    echo "[ERRO] URL com formato inválido.";
}

?>
