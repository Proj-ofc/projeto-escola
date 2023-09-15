
  const userCardTemplate = document.querySelector("[data-user-template]");
  const userCardContainer = document.querySelector("[data-bloco-comp-container]");
  const searchInput = document.querySelector("[data-search]");
  
  let users = [];
  
  searchInput.addEventListener("input", e => {
    const value = e.target.value.toLowerCase();
    users.forEach(comp => {
      const isVisible =
        comp.nome.toLowerCase().includes(value) ||
        comp.quantia.toString().includes(value) ||
        comp.preco.toString().includes(value);
      comp.element.classList.toggle("hide", !isVisible);
    });
  });
  
  fetch("access.php")
  .then(response => response.json())
  .then(data => {
    console.log(data);
    users = data.map(comp => {
      const card = userCardTemplate.content.cloneNode(true).children[0];
      const header = card.querySelector("[data-header]");
      const body = card.querySelector("[data-body]");
      const body2 = card.querySelector("[data-body2]");
      
      header.textContent = comp.nome;
      body.textContent = comp.quantia;
      header.textContent = comp.nome;

      body.textContent = "Estoque: " + comp.quantia;

      // Formata preco (o preço) usando Intl.NumberFormat
      const formattedPrice = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      }).format(comp.preco);
      
      body2.textContent = formattedPrice;
      
      userCardContainer.append(card);
      return { nome: comp.nome, quantia: comp.quantia, preco: comp.preco, element: card };
    });
  })
.catch(error => console.error('Error:', error));
console.log(searchInput);
console.log(userCardTemplate);
console.log(userCardContainer);
  