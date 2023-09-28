<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'admin') {
    
    echo 'Matricular aluno:'

}
else{
    header("Location: index.html");
    exit();
}

?>