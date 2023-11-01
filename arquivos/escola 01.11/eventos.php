<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Roboto:wght@700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Roboto:wght@700&family=Stardos+Stencil:wght@400;700&display=swap');
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
    <title>Sistema de Login</title>
    <link href="eventos style.css" rel="stylesheet" type="text/css" />
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
require_once 'conecta.php';
session_start();
if ($_SESSION['user_role'] === 'admin') {

    $lugarimg = '';

    $email = $_SESSION['username'];

    $lugarimg = '';

    $query = "SELECT * FROM usuarios WHERE email = ?"; //espaço reservado para o ra
    
    $stmt = $conn->prepare($query); //preparar a declaração
    
    $stmt->bind_param("s", $email); // linkar ra com o espaço reservado ao usuário (aluno). "s" significa que o tipo de dado é uma string... podem haver 'i' - inteiros; 'd' - double/decimal ou 'b' - binário.
    
    $stmt->execute(); //executar a declaração
    
    $result = $stmt->get_result(); //pegar o resultado

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
    }
else if ($_SESSION['user_role'] === 'aluno') {

    $lugarimg = '';

    $ra = $_SESSION['username'];

    $lugarimg = '';

    $query = "SELECT * FROM usuarios WHERE ra = ?"; //espaço reservado para o ra
    
    $stmt = $conn->prepare($query); //preparar a declaração
    
    $stmt->bind_param("s", $ra); // linkar ra com o espaço reservado ao usuário (aluno). "s" significa que o tipo de dado é uma string... podem haver 'i' - inteiros; 'd' - double/decimal ou 'b' - binário.
    
    $stmt->execute(); //executar a declaração
    
    $result = $stmt->get_result(); //pegar o resultado

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
    }
?>
<div class="fundo">

<div class="cima">
<p id="eventos">Eventos</p>

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

    <div class="cards_geral">
        <div class="cards">
        <img src="Rectangle 113.png" alt="">
        <p class="desc">Carnaval</p>
        </div>
        <div class="cards">
        <img src="Rectangle 114.png" alt="">
        <p class="desc">Páscoa</p>
        </div>
        <div class="cards">
        <img src="Rectangle 115.png" alt="">
        <p class="desc">Festa Junina</p>
        </div>
        <div class="cards">
        <img src="Rectangle 116.png" alt="">
        <p class="desc">Escola Aberta</p>
        </div>
    </div>
    <div class="cards_geral">
        <div class="cards">
        <img src="Rectangle 117.png" alt="">
        <p class="desc">Halloween</p>
        </div>
        <div class="cards">
        <img src="Rectangle 118.png" alt="">
        <p class="desc">Consciência<br>Negra</p>
        </div>
        <div class="cards">
        <img src="Rectangle 119.png" alt="">
        <p class="desc">Natal</p>
        </div>
        <div class="cards">
        <img src="Rectangle 120.png" alt="">
        <p class="desc">Dia das <br>Crianças</p>
        </div>
    </div>
    <div class="logo">
    <a href="#"><img id="logo" width="108px" height="122.73px" src="logo2.png" alt="logo"></a>
</div>
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



</div>





</div>