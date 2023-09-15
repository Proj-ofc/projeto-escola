
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST ['nome'];
    $quantia = $_POST ['quantia'];
    $preco = $_POST ['preco'];

    if(!empty($nome) && !empty($quantia) && !empty($preco)){
        require_once ('connect.php');
        $sql = "SELECT * FROM compeletronicos WHERE nome = '$nome'";
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            echo '<script>
            alert("componente já inserido");
            </script>';

        }
    

    $sql = "insert into compeletronicos (nome, quantia, preco) values('$nome','$quantia','$preco')";
    if ($conn->query($sql)===TRUE){
        echo '<script>alert("peça cadastrada com sucesso!")</script>';
        header("Refresh: 1; URL=inserir.php");
    } 
    else{
        echo 'ocorreu um erro ao cadastrar o componente' . $conn->error;
    }
    $conn->close();
    }else{
        header("Refresh: 1; URL=inserir.php");
        exit();
    }
}
?>