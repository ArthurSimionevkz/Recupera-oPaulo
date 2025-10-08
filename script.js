document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("formCadastro");
  const resultado = document.getElementById("resultado");
  const consultarBtn = document.getElementById("consultar");

  // Cadastrar
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;

    const response = await fetch("php/controller.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `acao=cadastrar&nome=${encodeURIComponent(nome)}&email=${encodeURIComponent(email)}`
    });

    const data = await response.json();
    alert(data.mensagem);
    form.reset();
  });

  // Consultar
  consultarBtn.addEventListener("click", async () => {
    const response = await fetch("php/controller.php?acao=consultar");
    const data = await response.json();

    if (data.length === 0) {
      resultado.innerHTML = "<p>Nenhum cadastro encontrado.</p>";
      return;
    }

    let html = "<table border='1'><tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
    data.forEach(item => {
      html += `<tr><td>${item.id}</td><td>${item.nome}</td><td>${item.email}</td></tr>`;
    });
    html += "</table>";

    resultado.innerHTML = html;
  });
});
