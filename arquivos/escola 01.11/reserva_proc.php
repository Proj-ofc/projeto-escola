<?php
session_start();
require_once 'conecta.php';

if ($_SESSION['user_role'] === 'aluno') {
    $ra = $_SESSION['username'];
    $livro = $_POST['livro']; // Assuming you pass the book ID via POST

    // Validate and sanitize $livro to prevent SQL injection

    $query = "SELECT * FROM biblioteca WHERE livro = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $livro);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $livroId = $row['livro'];
        $reservado = $row['reservado'];

        if (!$reservado) {
            // Update the book's reservation status in the database
            $query = "UPDATE biblioteca SET reservado = 1, usuario = ?, data_reserva = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $data_reserva = date("Y-m-d", strtotime("+7 days"));
            $stmt->bind_param("ssi", $ra, $data_reserva, $livroId);
            $stmt->execute();
            
            echo 'O livro está reservado até o dia: ' . $data_reserva;
        } else {
            echo 'O livro já foi reservado. A reserva expira no dia: ' . $row['data_reserva'];
        }
    } else {
        echo 'Livro não encontrado.';
    }
} else {
    echo 'Acesso negado.';
}
