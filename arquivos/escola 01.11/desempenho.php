<?php
session_start();
require_once 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nota = $_POST['nota'];

    if (!empty($usuario) && !empty($senha)) {
        $ra = $_SESSION['username'];
        
        $sql = "SELECT * FROM usuarios WHERE ra = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $ra);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $senha_database = $row['senha'];
 
            if ($senha === $senha_database)
            {
               if ($nota === 'matematica p1')
               {
                $notaAluno = $row['N1'];

                $sqlnotas = "SELECT AVG(N1) AS media FROM usuarios";

                $resultnotas = $conn->query($sqlnotas);


                $rownotas = $resultnotas->fetch_assoc();
                $media = $rownotas["media"];
               }

               if ($nota === 'matematica p2')
               {
                $notaAluno = $row['N2'];

                $sqlnotas = "SELECT AVG(N2) AS media FROM usuarios";

                $resultnotas = $conn->query($sqlnotas);


                $rownotas = $resultnotas->fetch_assoc();
                $media = $rownotas["media"];
               }

               if ($nota === 'matematica extra')
               {
                $notaAluno = $row['N3'];

                $sqlnotas = "SELECT AVG(N3) AS media FROM usuarios";

                $resultnotas = $conn->query($sqlnotas);


                $rownotas = $resultnotas->fetch_assoc();
                $media = $rownotas["media"];
               }

               if ($nota === 'portugues p1')
               {
                $notaAluno = $row['N5'];

                $sqlnotas = "SELECT AVG(N5) AS media FROM usuarios";

                $resultnotas = $conn->query($sqlnotas);


                $rownotas = $resultnotas->fetch_assoc();
                $media = $rownotas["media"];
               }

               if ($nota === 'portugues p2')
               {
                $notaAluno = $row['N6'];

                $sqlnotas = "SELECT AVG(N6) AS media FROM usuarios";

                $resultnotas = $conn->query($sqlnotas);


                $rownotas = $resultnotas->fetch_assoc();
                $media = $rownotas["media"];
               }

               if ($nota === 'portugues extra')
               {
                $notaAluno = $row['N7'];

                $sqlnotas = "SELECT AVG(N7) AS media FROM usuarios";

                $resultnotas = $conn->query($sqlnotas);


                $rownotas = $resultnotas->fetch_assoc();
                $media = $rownotas["media"];
               }
            
             





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
  </head>
  <body style="border: 20px solid darkred; size: border-box;" >
    
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


     <div class="container my-4">
    <h1>Desempenho</h1>
    <!-- Notas -->
    <div class="row justify-content-center gap-3 my-4" style="height: 200px;">
        <!-- Notas do Aluno -->
        <div class="col-md-4 text-center">
            <div class="bg-primary" id="aluno" style="display: none; width: 100px;">
                <h1 id="notaAluno"></h1>
            </div>
            <div class="bg-primary text-center" style="width: 100px;">
                <h3>Aluno</h3>
            </div>
        </div>
        <!-- Média da Sala -->
        <div class="col-md-4 text-center">
            <div class="bg-danger" id="sala" style="display: none; width: 100px;">
                <h1 id="notaMedia"></h1>
            </div>
            <div class="bg-danger text-center" style="width: 100px;">
                <h3>Média</h3>
            </div>
        </div>
    </div>
    <!-- Notas -->

    <form action="desempenho.php" class="border rounded border-secondary bg-light px-4 py-5" method="post">

    <div class="form-floating mb-4">        
    <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario:" required >
      <label for="usuario">Usuario:</label>
    </div>

    <div class="form-floating mb-4">        
    <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha:" required >
      <label for="senha">Senha:</label>
    </div>

                <select name="nota" class="form-select mb-4" id="notaSelect" aria-label="Selecionar nota" required>
                    <option selected>Selecione uma nota</option>
                    <option value="matematica p1">matematica p1</option>
                    <option value="matematica p2">matematica p2</option>
                    <option value="matematica extra">matematica extra</option>
                    <option value="portugues p1">portugues p1</option>
                    <option value="portugues p2">portugues p2</option>
                    <option value="portugues extra">portugues extra</option>
                  </select>
                  

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary mb-2">Ver Resultado</button>
                </div>

                <div class="d-grid gap-2">
                    <button type="reset" class="btn btn-danger mb-2">Reset</button>
                </div>
            </form>


     <div class="container justify-content-center" style="height: 200px;">
        <div class="row-md-4 bg-success" id="aluno" style="display: none; height: 50px; width: 50px;"></div>
        <div class="row-md-4 bg-danger" id="sala" style="display: none; height: 50px; width: 50px;"></div>
    </div>
</div>
     
   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
         var nota = <?php echo json_encode($notaAluno); ?>;
         var media = <?php echo $media; ?>

         function biblarar()
         {
            console.log("A função biblarar foi chamada.");
           
          if (nota != null && media != null)
          {
            var tamanhonota = nota*10;
            var tamanhomedia = media*10;

            var aluno = document.getElementById('aluno');
            var sala = document.getElementById('sala');

            aluno.style.height = tamanhonota + "%"; // Defina a altura da div 'aluno'
            sala.style.height = tamanhomedia + "%"; // Defina a altura da div 'sala'
            aluno.style.display = 'block'; // Exiba a div 'aluno'
            sala.style.display = 'block'; // Exiba a div 'sala'
            
            document.getElementById('notaAluno').textContent = nota;
            document.getElementById('notaMedia').textContent = media;
          }
         }

         window.onload = biblarar;
    </script>
  </body>
</html>