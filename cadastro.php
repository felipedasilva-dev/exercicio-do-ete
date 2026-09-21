<?php
// ==========================================
// CONEXÃO COM O BANCO DE DADOS
// ==========================================
// Dados do MySQL
$servidor = "localhost";
$usuario = "root";
$senhaBanco = "";
$banco = "portfolio";
// Cria a conexão utilizando PDO
try {
$pdo = new PDO(
"mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
$usuario,
$senhaBanco
);
// Configura o PDO para mostrar erros
$pdo->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
die("Erro ao conectar com o banco de dados: " . $erro-
>getMessage());
}

// ==========================================
// PROCESSAMENTO DO FORMULÁRIO
// ==========================================
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Recebe os dados enviados pelo formulário
$nome = trim($_POST["nome"]);
$email = trim($_POST["email"]);
$senha = $_POST["senha"];

// ==========================================
// VALIDAÇÃO DOS DADOS
// ==========================================
if (empty($nome) || empty($email) || empty($senha)) {
$mensagem = "Preencha todos os campos.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$mensagem = "Digite um e-mail válido.";
} elseif (strlen($senha) < 6) {
$mensagem = "A senha deve possuir pelo menos 6
caracteres.";
} else {
// ==========================================
// VERIFICA SE O E-MAIL JÁ EXISTE
// ==========================================
$sql = "SELECT id FROM usuarios WHERE email = ?";
$consulta = $pdo->prepare($sql);
$consulta->execute([$email]);
if ($consulta->fetch()) {
$mensagem = "Este e-mail já está cadastrado.";
} else {
// ==========================================

// CRIPTOGRAFIA DA SENHA
// ==========================================
// Nunca devemos salvar a senha diretamente no banco.
// password_hash() cria um hash seguro.
$senhaHash = password_hash(
$senha,
PASSWORD_DEFAULT
);

// ==========================================
// INSERE O USUÁRIO NO BANCO
// ==========================================
$sql = "INSERT INTO usuarios (nome, email, senha)
VALUES (?, ?, ?)";
$consulta = $pdo->prepare($sql);
$consulta->execute([
$nome,
$email,
$senhaHash
]);
$mensagem = "Cadastro realizado com sucesso!";
}
}
}
?>

