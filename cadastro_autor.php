<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php require 'php/componentes/nav.php' ?>
    <main class="container-principal">
        <form action="" method="POST">
            <fieldset>
                <legend>Cadastro de Autor</legend>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require 'php/conexao.php';

                    $nome = $_POST['nome'];
                    $nacionalidade = $_POST['nacionalidade'];
                    $idade = $_POST['idade'];
                    $telefone = $_POST['telefone'];

                    $inserindo = "INSERT INTO autores(nome_autor,nacionalidade_autor,idade_autor,telefone_autor)VALUES('$nome','$nacionalidade','$idade','$telefone')";
                    mysqli_query($con, $inserindo);
                    echo "<div class='sucesso'><p>Sucesso!</p></div>";
                    
                    mysqli_close($con);
                }
                ?>
                <div class="caixa-input">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome do Autor" required>
                </div>
                <div class="caixa-input">
                    <label for="">Nacionalidade:</label>
                    <input type="text" name="nacionalidade" id="nacionalidade" placeholder="Brasileiro" required>
                </div>
                <div class="caixa-input">
                    <label for="">Idade:</label>
                    <input type="number" name="idade" id="idade" placeholder="1" required>
                </div>
                <div class="caixa-input">
                    <label for="">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" placeholder="+00 (00) 00000-0000" required>
                </div>
            </fieldset>
            <div class="caixa-btn">
                <button>Cadastrar</button>
            </div>
        </form>
    </main>
</body>

</html>