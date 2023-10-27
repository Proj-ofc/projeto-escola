<?php
    $host = 'localhost';

    $username = 'root';

    $password = '';

    $database = 'aq';


    $conn = new mysqli($host, $username, $password, $database);


    if ($conn->connect_error){
    die('Erro de conexao com o banco de dados' . $conn->connect_error);
    }


?>