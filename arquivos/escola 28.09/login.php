<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link href="login.css" rel="stylesheet" type="text/css" />
</head>
<body>


    <div class = "formulario" >
        <div class = "formulario_info" >
            <h2>Tela de Login</h2>
        <form method = "post" action="processamento_login.php">
            <input type="text" name="login" id="login" placeholder="RA ou E-mail">
            <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="submit" value = "Login">
        <input type="reset" value="Limpar">



            </form>
        </div>
    </div>
</body>
</html>