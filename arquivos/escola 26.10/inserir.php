<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-biblatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles2.css">
  <title>Registrar biblonentes</title>
</head>
<body>
  <!-- favor mudar o nome das variáveis de acordo com as usadas no servidor -->
<form method="post" action="process.php" class="fm">
    <label for="nome">digite o nome do biblonente:</label>
    <input type="text" id="nome" name="nome"> 

    <label for="quantia">quantia:</label>
    <input type="number" id="quantia" name="quantia">

    <label for="preco" id='lb3'>preço:</label> 
    <p id='rs'>R$</p>
    <input type="number" id="preco" name="preco" step="0.01">

    <button type="submit">registrar</button>
</form>

    
</body>
</html>