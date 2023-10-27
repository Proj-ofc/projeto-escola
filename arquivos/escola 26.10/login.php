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
    <link rel="stylesheet" href="login_style.css">
    <title>Sistema de Login</title>
    <link href="login.css" rel="stylesheet" type="text/css" />
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class = "navbar-brand" href="#"><img src="logo2.png" width = "40.63px" height = "46px" top = "9px" left = "96px" alt="logo"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Início</a>
        <a class="nav-link" href="#">Fundamental I</a>
        <a class="nav-link" href="#">Fundamental II</a>
        <a class="nav-link" href="#">Ensino Médio</a>
        <a class="nav-link" href="#">Sobre</a>
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

<a class="btn custom-btn" href="#" role="button">Login</a>



  </div>
</nav>
    </header>

<div class="retangulo">
    <div class = "formulario" >
      <h2>Fazer Login</h2>
        <form method = "post" action="processamento_login.php">
            <input type="text" name="login" id="login" placeholder="Usuário">
            <input type="password" name="senha" id="senha" placeholder="Senha">
            <a id="es" href="esqueci_senha.php">Esqueci senha</a>
            <div class= "center-container">
        <input id="entrar" type="submit" value = "ENTRAR">
        </div>
        <style>

</style>
            </form>
        </div>
    </div>
</body>
</html>