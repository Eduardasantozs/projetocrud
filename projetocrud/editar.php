<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}
include_once './config/config.php';
include_once './classes/Usuario.php';


$usuario = new Usuario($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];
    $usuario->atualizar($id, $nome, $sexo, $fone, $email);
    header('Location: portal.php');
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = $usuario->lerPorId($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <style>/* editar.css */

/* Reseta os estilos padrões do navegador */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Corpo da página */
body {
    font-family: Arial, sans-serif;
    background-color: #fce4ec; /* Fundo suave rosa claro */
    color: #333;
    line-height: 1.6;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center; /* Centraliza o conteúdo do texto dentro do body */
}

/* Container do formulário */
div {
    width: 100%;
    max-width: 600px; /* Definindo a largura máxima para o formulário */
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Formulário */
form {
    background-color: #ffffff; /* Fundo branco para o formulário */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    margin-top: 30px;
    border: 1px solid #f06292; /* Borda rosa suave para o formulário */
}

/* Título da página */
h1 {
    margin-bottom: 20px;
    color: #ec407a; /* Cor de título em rosa escuro */
}

/* Labels e campos de input */
label {
    font-size: 16px;
    margin-bottom: 5px;
    display: inline-block;
    color: #880e4f; /* Cor dos labels em rosa escuro */
}

/* Campos de entrada */
input[type="text"],
input[type="email"],
input[type="radio"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #f06292; /* Borda rosa clara para campos */
    border-radius: 4px;
    font-size: 14px;
    color: #333;
}

/* Estilo para os botões de rádio */
label input[type="radio"] {
    width: auto;
    display: inline-block;
    margin-right: 5px;
}

label input[type="radio"]:checked {
    background-color: #ec407a; /* Rosa escuro para quando selecionado */
    border: 1px solid #ec407a;
}

/* Estilo do botão de submit */
input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #ec407a; /* Botão rosa claro */
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #ad1457; /* Rosa escuro para o hover do botão */
}

/* Responsividade */
@media screen and (max-width: 600px) {
    body {
        padding: 20px;
    }

    form {
        width: 100%;
        padding: 15px;
    }
}
    </style>
</head>
<body>
    <div>
    <h1>Editar Usuário</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
        <br><br>
        <label>Sexo:</label>
        <label for="masculino_editar">
            <input type="radio" id="masculino_editar" name="sexo" value="M" <?php echo ($row['sexo'] === 'M') ? 'checked' : ''; ?> required> Masculino
        </label>
        <label for="feminino_editar">
            <input type="radio" id="feminino_editar" name="sexo" value="F" <?php echo ($row['sexo'] === 'F') ? 'checked' : ''; ?> required> Feminino
        </label>
        <br><br>
        <label for="fone">Fone:</label>
        <input type="text" name="fone" value="<?php echo $row['fone']; ?>" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <br><br>
        <input type="submit" value="Atualizar">
    </form>
</div>
</body>
</html>
