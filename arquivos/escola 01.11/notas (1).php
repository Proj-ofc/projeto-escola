<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
  </head>
  <body style="border: 20px solid darkred; size: border-box;">
    
    <!-- cabeçario -->
    <div class="container-fluid">
    
      <div class="row align-items-betwen mt-2" >
       
        <div class="col-md-10 text-center mx-5 ">
          <ul class="nav justify-content-between ">
            
            <li class="nav-item">
            <button style="border: 0px;"  class="btn btn-secondary">
              <a class="nav-link nav-text"  href="#">Calendário</a>
            </button>
            </li>
            
           
            <li class="nav-item">
            <button style="border: 0px;"  class="btn btn-secondary">
              <a class="nav-link nav-text" href="#">Notas/Faltas</a>
              </button>
            </li>
            
            
            <li class="nav-item">
            <button style="border: 0px;"  class="btn btn-secondary">
              <a class="nav-link nav-text" href="#">Desempenho</a>
              </button>
            </li>
            
            <li class="nav-item">
            <button style="border: 0px;"  class="btn btn-secondary">
              <a class="nav-link nav-text" href="#">Financeiro</a>
              </button>
            </li>
            
            <li>
            <button style="border: 0px; border-radius:30px;"class="btn btn-dark btn-sm">
              <a class="nav-link nav-text text-light" href="#">Sair</a>
              </button>
              </li>
              </ul>
          
        </div>
    </div>
     <!-- cabeçario -->


     <div class="container-fluid mt-5">
        <h1>Notas/Faltas</h1>

       <div class="row justify-content-center">
<?php
session_start();
require_once 'conecta.php';


if ($_SESSION['user_role'] === 'aluno') {

    $lugarimg = '';

    $ra = $_SESSION['username'];

    $lugarimg = '';

    $query = "SELECT * FROM usuarios WHERE ra = ?"; //espaço reservado para o ra.
    
    $stmt = $conn->prepare($query); //preparar a declaração.
    
    $stmt->bind_param("s", $ra); // linkar ra com o espaço reservado ao usuário (aluno). "s" significa que o tipo de dado é uma string... podem haver 'i' - inteiros; 'd' - double/decimal ou 'b' - binário.
    
    $stmt->execute(); //executar a declaração.
    
    $result = $stmt->get_result(); //pegar o resultado.

    if ($_SESSION['user_role'] === 'aluno') {
      $ra = $_SESSION['username'];
      $query = "SELECT * FROM usuarios WHERE ra = ?";
      
      $stmt = $conn->prepare($query);
      $stmt->bind_param("s", $ra);
      $stmt->execute();

  


    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $p1matematica = $row['N1'];
        $p2matematica = $row['N2'];
        $extramatematica = $row['N3'];
        $submatematica = $row['N4'];
        $p1portugues = $row['N5'];
        $p2portugues = $row['N6'];
        $extraportugues = $row['N7'];
        $subportugues = $row['N8'];

        $faltasmatematica = $row['faltas1'];
        $faltasportugues = $row['faltas2'];

        if ($submatematica > $p1matematica)
        {
          $p1matematica = $submatematica;
        } elseif ($submatematica > $p2matematica)
        {
          $p2matematica = $submatematica;
        }

        if ($subportugues > $p1portugues)
        {
          $p1portugues = $subportugues;
        } elseif ($subportugues > $p2portugues)
        {
          $p2portugues = $subportugues;
        }

        $totalmatematica = $p1matematica + $p2matematica + $extramatematica;
        $totalportugues = $p1portugues + $p2portugues + $extraportugues;
    } 
    if (!empty($row)) {
      echo "<h2>Notas de ". $row["nome"] ."</h2>";
      echo "<table border='1' class='table'>";
      echo "<tr><th scope='col'>Materia</th><th scope='col'>P1</th><th scope='col'>P2</th><th scope='col'>Extra</th><th scope='col'>Sub</th><th scope='col'>Faltas</th><th scope='col'>Total</th></tr>";
      echo "<tr><th scope='row'>Português</td><td>$p1portugues</td><td>$p2portugues</td><td>$extraportugues</td><td>$subportugues</td><td>$faltasportugues</td><td>$totalportugues</td></tr>";
      echo "<tr><th scope='row'>Matemática</td><td>$p1matematica</td><td>$p2matematica</td><td>$extramatematica</td><td>$submatematica</td><td>$faltasmatematica</td><td>$totalmatematica</td></tr>";
      echo "</table>";
    }
}} else {echo 'usuario não encontrado';}
?>
     </div>
    </div>
   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>