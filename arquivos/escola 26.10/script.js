const bookCardTemplate = document.querySelector("[template-livros]");
const bookCardContainer = document.querySelector("[data-bloco-livro-container]");
const searchInput = document.querySelector("#livroInput");

let livros = [];

searchInput.addEventListener("input", e => {
  const livroPesquisado = e.target.value.toLowerCase();
  livros.forEach(bibl => {
    const isVisible = bibl.nome.toLowerCase().includes(livroPesquisado);
    bibl.element.classList.toggle("hide", !isVisible);
  });  
});

document.querySelector("#verResultado").addEventListener("click", (e) => {
  e.preventDefault();

  const livroPesquisado = searchInput.value;

  fetch("access.php?livro=" + livroPesquisado)
    .then(response => response.json())
    .then(data => {
      bookCardContainer.innerHTML = ""; // Limpa os resultados anteriores

      if (data.length > 0) {
        livros = data.map(bibl => {
          const card = bookCardTemplate.content.cloneNode(true).querySelector(".card");
          const header = card.querySelector("[data-header]");
          const imagem = card.querySelector("[data-foto]");

          header.textContent = bibl.livro;

          const img = document.createElement('img');
          img.setAttribute('src', bibl.img_livro);
          imagem.innerHTML = ''; // Limpa todo o conteúdo anterior
          imagem.appendChild(img);

          bookCardContainer.appendChild(card);
          return { livro: bibl.livro, img_livro: bibl.img_livro, element: card };
        });
      } else {
        // Caso nenhum livro seja encontrado, exibirá essa mensagem de erro.
        bookCardContainer.innerHTML = "Nenhum livro encontrado.";
      }
    })
    .catch(error => console.error('Erro:', error));
});

console.log(searchInput);
console.log(bookCardTemplate);
console.log(bookCardContainer);
