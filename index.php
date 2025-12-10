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
                <p>Olá! sejá bem-vindo a nossa Biblioteca.</p>
                <p>Esperamos que tenha uma boa experiencia em nosso sitemas</p>
            </div>
        </section>
        <section class="sec-infos">
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h4>Qntd Total de Livros</h4>
                </div>
                <div class="caixas-info-numero">
                    <?php
                        require 'php/conexao.php';

                        $sql = "SELECT * FROM obras";
                        $executando = mysqli_query($con,$sql);

                        if(mysqli_num_rows($executando) == 0){
                            echo "<p>Nnehum Livro Registrado</p>";
                        } else{
                            $numero = mysqli_num_rows($executando);
                            echo "<p>$numero</p>";
                        }
                    ?>
                </div>
            </div>
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h4>Usuários Cadastrados</h4>
                </div>
                <div class="caixas-info-numero">
                    <?php
                        require 'php/conexao.php';

                        $sql = "SELECT * FROM usuarios";
                        $executando = mysqli_query($con,$sql);

                        if(mysqli_num_rows($executando) == 0){
                            echo "<p>Nnehum Usuário Registrado</p>";
                        } else{
                            $numero = mysqli_num_rows($executando);
                            echo "<p>$numero</p>";
                        }
                    ?>
                </div>
            </div>
            <div class="caixas-info">
                <div class="caixas-info-header">
                    <h4>N° de Empréstimos Total</h4>
                </div>
                <div class="caixas-info-numero">
                    <?php
                        require 'php/conexao.php';

                        $sql = "SELECT * FROM emprestimos";
                        $executando = mysqli_query($con,$sql);

                        if(mysqli_num_rows($executando) == 0){
                            echo "<p>Nnehum Emprestimo Realizado</p>";
                        } else{
                            $numero = mysqli_num_rows($executando);
                            echo "<p>$numero</p>";
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>