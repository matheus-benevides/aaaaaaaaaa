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
                <legend>Cadastro de Emprestimo</legend>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require 'php/conexao.php';

                    $nome = $_POST['nome'];
                    $obra = $_POST['obra'];
                    $data_emp = $_POST['data_emp'];
                    $data_prev = $_POST['data_prev'];

                    $insert = "INSERT INTO emprestimo(
                        usuario_emprestimo,
                        obra_emprestimo,
                        data_emprestimo,
                        data_prevista_emprestimo,
                    )VALUES(
                        '$nome',
                        '$obra',
                        '$data_emp',
                        '$data_prev'
                    );";

                    mysqli_query($con, $insert);

                    $update = "UPDATE obras SET emprestimo_obra = 1 WHERE id_obra = $obra";
                    mysqli_query($con, $update);

                    mysqli_close($con);
                }
                ?>
                <div class="caixa-input">
                    <label for="">Nome:</label>
                    <select name="usuarios" id="usuarios">
                        <?php
                        require 'php/conexao.php';

                        $select = "SELECT * FROM usuarios";
                        $executando = mysqli_query($con, $select);

                        if (mysqli_num_rows($executando) == 0) {
                            echo "<option value='' disabled selected>Nenhum Usuário Disponível!</option>";
                        } else {
                            echo "<option value='' disabled selected>Selecione o Usuário</option>";
                            while ($linha = mysqli_fetch_array($executando)) {
                                echo "<option value='" . $linha['id_usuario'] . "'>" . $linha['nome_usuario'] . "</option>";
                            }
                        }

                        mysqli_close($con);
                        ?>
                    </select>
                </div>
                <div class="caixa-input">
                    <label for="">Obra:</label>
                    <select name="obra" id="obra">
                        <?php
                        require 'php/conexao.php';

                        $select = "SELECT * FROM obras WHERE emprestimo_obra = 0";
                        $executando = mysqli_query($con, $select);

                        if (mysqli_num_rows($executando) == 0) {
                            echo "<option value='' disabled selected>Nenhum Livro Disponível!</option>";
                        } else {
                            echo "<option value='' disabled selected>Selecione o Livro</option>";
                            while ($linha = mysqli_fetch_array($executando)) {
                                echo "<option value='" . $linha['id_obra'] . "'>" . $linha['nome_obra'] . "</option>";
                            }
                        }

                        mysqli_close($con);
                        ?>
                    </select>
                </div>
                <div class="caixa-input">
                    <label for="">Data de Emprestimo:</label>
                    <input type="date" name="data_emp" id="data_emp" required value='<?php date_default_timezone_set('America/Sao_Paulo');
                                                                                        echo date("Y-m-d"); ?>'>
                </div>
                <div class="caixa-input">
                    <label for="">Data de Devolução Prevista:</label>
                    <input type="date" name="data_prev" id="data_prev" required value='<?php date_default_timezone_set('America/Sao_Paulo');
                                                                                        echo date("Y-m-d"); ?>'>
                </div>
                <div class="caixa-btn">
                    <button>Cadastrar</button>
                </div>
            </fieldset>
        </form>
    </main>
</body>

</html>