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
                <legend>Cadastro de Editora</legend>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require 'php/conexao.php';

                    $nome = $_POST['nome'];
                    $endereco = $_POST['endereco'];

                    $inserindo = "INSERT INTO editoras(nome_editora,endereco_editora)VALUES('$nome','$endereco')";
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
                    <label for="">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" placeholder="R. Exemplo, 001" required>
                </div>
            </fieldset>
            <div class="caixa-btn">
                <button>Cadastrar</button>
            </div>
        </form>
    </main>
</body>

</html>