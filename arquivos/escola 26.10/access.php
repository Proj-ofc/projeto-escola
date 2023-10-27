<?php
require_once('conecta.php');

$livroPesquisado = $_GET['livro']; // Certifique-se de que o nome do parâmetro corresponda ao que está no seu código JavaScript

$sql = "SELECT * FROM biblioteca WHERE livro LIKE '%$livroPesquisado%'";
$result = $conn->query($sql);


$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$jsonData = json_encode($data);

header('Content-Type: application/json');
echo $jsonData;
?>
