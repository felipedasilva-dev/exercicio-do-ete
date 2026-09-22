<?php
// ==========================================
// CADASTRO.PHP
// Tela simples de cadastro
// ==========================================
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Recebe os dados enviados pelo formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
// Aqui, por enquanto, apenas exibimos uma mensagem.
// Posteriormente, esses dados podem ser salvos em um banco de dados.
echo "<h2>Cadastro realizado com sucesso!</h2>";
echo "<p>Nome: " . htmlspecialchars($nome) . "</p>";
echo "<p>E-mail: " . htmlspecialchars($email) . "</p>";
// Não mostramos a senha na tela por segurança.
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-
scale=1.0">

<title>Cadastro</title>

<!-- Utiliza o mesmo arquivo CSS do seu projeto -->
<link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>
<!-- Título da tela -->
<h1>Cadastro</h1>
<!-- Link para voltar ao portfólio -->
<nav>
<a href="teste.html">Voltar para o Portfólio</a>
</nav>
</header>
<main>
<section>
<h2>Crie sua conta</h2>
<!--
Formulário de cadastro.
method="POST":
Envia os dados de forma mais adequada para formulários.
action="cadastro.php":
Indica que os dados serão enviados para este próprio

arquivo.
-->
<form action="cadastro.php" method="POST">
<!-- Campo Nome -->
<p>
<label for="nome">Nome:</label>
<br>
<input
type="text"
id="nome"

name="nome"
placeholder="Digite seu nome"
required
>
</p>
<!-- Campo E-mail -->
<p>
<label for="email">E-mail:</label>
<br>
<input
type="email"
id="email"
name="email"
placeholder="Digite seu e-mail"
required
>
</p>
<!-- Campo Senha -->
<p>
<label for="senha">Senha:</label>
<br>
<input
type="password"
id="senha"
name="senha"
placeholder="Digite sua senha"
required
>
</p>
<!-- Botão Cadastrar -->
<p>
<button type="submit">
Cadastrar
</button>
</p>
</form>

</section>
</main>
<footer>
<hr>
<p>© 2026 - Desenvolvido por Felipe Antônio</p>
</footer>
</body>
</html>