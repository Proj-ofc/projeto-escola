<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Roboto:wght@700&display=swap');
</style>
   <!-- <a class="navbar-brand" href="#">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap
    </a> -->
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-biblatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pag aluno style.css">
    <title>Sistema de Login</title>
    <link href="login.css" rel="stylesheet" type="text/css" />
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
require_once 'conecta.php';
session_start();

if ($_SESSION['user_role'] === 'aluno') {

    $lugarimg = '';

    $ra = $_SESSION['username'];

    $lugarimg = '';

    $query = "SELECT * FROM usuarios WHERE ra = ?"; //espaço reservado para o ra.
    
    $stmt = $conn->prepare($query); //preparar a declaração.
    
    $stmt->bind_param("s", $ra); // linkar ra com o espaço reservado ao usuário (aluno). "s" significa que o tipo de dado é uma string... podem haver 'i' - inteiros; 'd' - double/decimal ou 'b' - binário.
    
    $stmt->execute(); //executar a declaração.
    
    $result = $stmt->get_result(); //pegar o resultado.

    if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

            // nome da imagem guardada no banco da determinada pessoa logada:
            $nomeimagem = $row["foto"];
            if(!empty($nomeimagem)){
        
            // lugar da imagem
            $diretorioimg = '/upload/';
    
            // lugar + nome da imagem
            $lugarimg = $diretorioimg . $nomeimagem;
            }
        else{
        $diretorioimg = '/escola 01.11/';
        $nomeimagem = 'padrão.png';
        $lugarimg = $diretorioimg . $nomeimagem;
        }
    
        } else {
        echo 'User data not found.';
        }
?>
<div class="fundo">
<div id="cont1">
    <div id="subcont1" class="subcont1">
        <div class="opcoes">
            Calendário
        </div>
        <div class="opcoes">
            Notas/Faltas
        </div>
        <div class="opcoes">
            Desempenho
        </div>
        <div class="opcoes">
            Financeiro
        </div>
    </div>
    <div class = "subcont2">
        <div>
    <?php echo '<a href="usuario.php"><img class="usu" src=
        "'.$lugarimg.'"
        width="93px" height="93px" alt="user.png"></a>';?>
    </div>
          <style>
    .custom-btn {
    background-color: #000000;
    color: #ffffff;
    width: 110px;
    height: 36px;
    border-radius: 30px;
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
    font-weight: 700;
    line-height: 29px;
    letter-spacing: 0em;
    text-align:center;
    border:solid 1px black;
    padding-bottom:30px;
    }

    .custom-btn:hover {
  background-color: #FFFFFF;
    }

    </style>
    <div id="sair">
    <a class="btn custom-btn" href="logout.php" role="button">Sair</a>
    </div>
    </div>
    </div>

<div class = "cont2">
    <?php
            echo '<a href="usuario.php"><img class="usu" src=
            "'.$lugarimg.'"
            width="359px" height="359px" alt="user.png"></a>';
    ?>
    
    <div class = "subcont3">
<?php
if (!empty($row)) {
        echo '<p> olá ' . $row["nome"] . '!<br></p>';
    }
} else {
    header("Location: usu.html");
    exit();
}
?>
    </div>
</div>


<div class = "logo">
<a href="#"><img id=#logo width = "108px" height = "122.73px" src="logo2.png" alt="logo"></a>
</div>

</div>