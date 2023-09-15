<?php
require_once('connect.php');

//favor mudar o nome "compeletronicos" para o nome da tabela que o servidor está usando.
$sql = "SELECT * FROM compeletronicos";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Converte dados para JSON
$jsonData = json_encode($data);

header('Content-Type: application/json');
echo $jsonData;
?>
