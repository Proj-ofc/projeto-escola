<?php
session_start();

if ($_SESSION['user_role'] === 'admin') {
    
    echo 'Matricular aluno:';

}
else{
    header("Location: index.html");
    exit();
}

?>