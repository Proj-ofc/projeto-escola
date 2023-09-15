<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <script src="script.js" defer></script>
  <title>Document</title>
</head>
<body>
  <div class="barra-de-pesquisa">
    <label for="search">Pesquisar Componentes</label>
    <input type="search" id="search" data-search>  <!--lugar a inserir caracteres-->
  </div>
  <div class="bloco-comp" data-bloco-comp-container></div>
  <template data-user-template>
    <div class="card">
      <div class="header" data-header></div>
      <div class="body" data-body></div>
      <div class="body2" data-body2></div>
    </div>
  </template>
</body>
</html>