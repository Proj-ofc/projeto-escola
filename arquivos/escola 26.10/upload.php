<?php
// nome da imagem guardada nessa variavel
$nomeimagem = $exibe["foto"];

// lugar da imagem
$diretorioimg = 'C:\xampp\htdocs\upload\/';

// lugar + nome da imagem
$lugarimg = $diretorioimg . $nomeimagem;

// pegar tipo da imagem (.png. jpeg. jpg, etc)
$imageMimeType = mime_content_type($lugarimg);

// setar cabeçalho apropriado p/ imagem
header('Content-Type: ' . $imageMimeType);
echo "Image path: " . $lugarimg . "<br>";

$nomeimagemlivros = $row["img_livro"]; // Suponha que o nome da imagem do livro seja armazenado no banco de dados.

// Lugar da imagem (substitua pelo caminho correto):
$diretorioimglivros = 'C:\caminho\para\imagens\dos\livros/';

// Lugar + nome da imagem dos livros:
$lugarimglivros = $diretorioimglivros . $nomeimagemlivros;

?>
