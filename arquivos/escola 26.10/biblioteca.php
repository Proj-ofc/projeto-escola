<?php
session_start();
require_once 'conecta.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $livro = $_POST['livro'];

    if(!empty($ra) && !empty($senha))
    {
        $sql = "SELECT * FROM usuarios WHERE ra=?";
        $resultado = $conn->query($sql);
 
 
        if ($resultado->num_rows === 1)
         {
            $row = $resultado->fetch_assoc();
            $senha_database = $row['senha'];
 
            if ($senha === $senha_database)
            {
              $id = $row['id'];
              $sql = "SELECT * FROM biblioteca WHERE livro='$livro'";
              $resultado = $conn->query($sql);
              $row = $resultado->fetch_assoc();
              $reservado= $row['reservado'];
              $fimReserva = $row['data_reserva'];
              $hoje = date("Y-m-d");

              if($reservado == false || $hoje > $fimReserva)
              {
                $data_reserva = date("Y-m-d", strtotime("+7 days"));
                $sql = "UPDATE biblioteca SET reservado = 1, data_reserva = '$data_reserva', usuario='$id' WHERE livro ='$livro'";
                $conn->query($sql);
                $mensagem = 'O livro esta reservado ate o dia: '.  $data_reserva;
              } else{$mensagem = 'O livro já esta foi reservado. A reserva expira no dia : '. $fimReserva;}
            
            } else echo 'senha incorreta';
        } else echo 'usuario não existe';
    } else echo 'digite usuario e senha';
} 


?>









<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <script src="script.js" defer></script>
    
  </head>
  <body style="border: 20px solid darkred; size: border-box;" >
    
    <!-- cabeçario -->
    <div class="container-fluid mb-4">
    
      <div class="row align-items-betwen mt-2" >
       <div class="col-md-9"><h2>Biblioteca on-line</h2></div>
       <div class="col-md-3 gap-5 d-flex justify-content-between">
       <?php

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
        $diretorioimg = '/alunosacademia/';
        $nomeimagem = 'padrão.png';
        $lugarimg = $diretorioimg . $nomeimagem;
        }
    
        } else {
        echo 'User data not found.';
        }
    }
?>
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
<div class="text-end">
<div id="sair">
<?php echo '<a href="usuario.php"><img class="usu" src=
        "'.$lugarimg.'"
        width="93px" height="93px" alt="login" style="border-radius: 50%;"></a>';?>
    <a class="btn custom-btn" href="logout.php" role="button">Sair</a>
    </div>
    <style>
#sair{
    padding-top: 20px;
}
    </style>
          </div>
        </div>
      </div>
    </div>
     <!-- cabeçario -->

    <div class="container-fluid my-4">
        <div class="row align-items-between" style="background: linear-gradient(180deg, #FFFFFF 0%, rgba(244, 88, 65, 0) 100%);" >
        <div class="row"><h3>Destaques do mês</h3></div>
        <div class="row">
        <div class="col-md-2"><img src="" alt="livro1" class="livroDestaque"></div>
        <div class="col-md-2"><img src="" alt="Livro2" class="livroDestaque"></div>
        <div class="col-md-2"><img src="" alt="Livro3" class="livroDestaque"></div>
        <div class="col-md-2"><img src="" alt="Livro4" class="livroDestaque"></div>
        <div class="col-md-2"><img src="" alt="Livro5" class="livroDestaque"></div>
        </div>
        </div>
    </div>
    





    <div class="container">

    <h2 class="text-warning my-4">
        <?php
        if(isset($mensagem))
        {
            echo $mensagem;
        }
         ?>
    </h2>

    <h1>Selecione o livro que deseja reservar</h1>
    <form action="biblioteca.php" class="border rounded border-secondary bg-light px-4 py-5" method="post">
        <div class="form-floating mb-4">
            <input class="form-control" type="usuario" name="usuario" id="usuario" placeholder="Usuario:" required>
            <label for="usuario">Usuario:</label>
        </div>
        <div class="form-floating mb-4">
            <input class="form-control" type="senha" name="senha" id="senha" placeholder="Senha:" required>
            <label for="senha">Senha:</label>
        </div>
        <div class="input-group mb-4">
            <input type="text" name="livro" class="form-control" id="livroInput" placeholder="Pesquisar livro" required>
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mb-2" id="verResultado">Ver Resultado</button>
        </div>
        <div class="d-grid gap-2">
            <button type="reset" class="btn btn-danger mb-2">Reset</button>
        </div>
    </form>
</div>




<div class="bloco-bibl" data-bloco-livro-container></div>
<template template-livros>
    <div class="card">
        <div class="header" data-header></div>
        <div class="imagem" data-foto><a href="#"><img class="img_livro" src="<?php echo $caminhoImagem; ?>" width="100px" height="100px" alt=""></a></div>
    </div>
</template>

<style>
  .hide {
  display: none;
  }
</style>
     
   

 <div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-2"><img src="" alt="logo" class="img-fluid"></div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  </body>
</html>