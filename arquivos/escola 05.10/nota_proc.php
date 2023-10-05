<?php

if($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $nomea = $_POST['nomea'];
    $P1 = $_POST['P1'];
    $P2 = $_POST['P2'];
    $P3 = $_POST['P3'];
    $extra = $_POST['extra'];
    $sub = $_POST['sub'];
    $faltas = $_POST['faltas'];


    $sql = "insert into notas/faltas (nomea, P1, P2, P3, extra, sub, faltas) values('$nomea', '$P1', '$P2', '$P3', '$extra', '$sub', '$faltas'";

    if ($conn->query($sql) === TRUE){
        //notas atualizadas com sucesso!
        echo 'notas atualizadas com sucesso!';
        header('Refresh: 1; URL=notas&faltas');
        exit();
    }
    else{
        echo 'ocorreu um erro ao cadastrar' . $conn->error;
    }
    //fechar conexão com banco de dados:
        $conn->close();
     else{
    //se o formulário não foi enviado:
        header("Location: registro.php");
        exit();
    }

}
?>