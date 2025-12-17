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
        <section class="sec-header">
            <div class="sec-header-icone">
                <p>📚</p>
            </div>
            <div class="sec-header-msg">
                <p>Olá! sejá bem-vindo a Beneteca.</p>
                <p>Esperamos que tenha uma boa experiencia em nosso sitemas</p>
            </div>
        </section>
        <section class="sec-infos">
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h3>Qntd Total de Livros</h3>
                </div>
                <div class="caixas-info-numero">
                    <?php
                    require 'php/conexao.php';

                    $sql = "SELECT * FROM obras";
                    $executando = mysqli_query($con, $sql);

                    $numero = mysqli_num_rows($executando);
                    echo "<p>$numero</p>";
                    ?>
                </div>
            </div>
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h3>Usuários Cadastrados</h3>
                </div>
                <div class="caixas-info-numero">
                    <?php
                    require 'php/conexao.php';

                    $sql = "SELECT * FROM usuarios";
                    $executando = mysqli_query($con, $sql);

                    $numero = mysqli_num_rows($executando);
                    echo "<p>$numero</p>";
                    ?>
                </div>
            </div>
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h3>Qntd de Empréstimos Realizados</h3>
                </div>
                <div class="caixas-info-numero">
                    <?php
                    require 'php/conexao.php';

                    $sql = "SELECT * FROM emprestimos";
                    $executando = mysqli_query($con, $sql);

                    $numero = mysqli_num_rows($executando);
                    echo "<p>$numero</p>";
                    ?>
                </div>
            </div>
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h3>Qntd de Livros Emprestados Atualmente</h3>
                </div>
                <div class="caixas-info-numero">
                    <?php
                    require 'php/conexao.php';

                    $sql = "SELECT * FROM obras WHERE emprestimo_obra = 1";
                    $executando = mysqli_query($con, $sql);

                    $numero = mysqli_num_rows($executando);
                    echo "<p>$numero</p>";
                    ?>
                </div>
            </div>
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h3>Qntd de Autores</h3>
                </div>
                <div class="caixas-info-numero">
                    <?php
                    require 'php/conexao.php';

                    $sql = "SELECT * FROM autores";
                    $executando = mysqli_query($con, $sql);

                    $numero = mysqli_num_rows($executando);
                    echo "<p>$numero</p>";
                    ?>
                </div>
            </div>
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h3>Qntd de editoras</h3>
                </div>
                <div class="caixas-info-numero">
                    <?php
                    require 'php/conexao.php';

                    $sql = "SELECT * FROM editoras";
                    $executando = mysqli_query($con, $sql);

                    $numero = mysqli_num_rows($executando);
                    echo "<p>$numero</p>";
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>

</html>