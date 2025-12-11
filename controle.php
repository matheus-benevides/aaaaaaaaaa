<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body style="height: auto;">
    <?php require 'php/componentes/nav.php' ?>
    <main class="container-principal" style="justify-content: flex-start;">
        <header>
            <h3>Emprestimos</h3>
        </header>
        <div class="tabela-aqui">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Obra</th>
                    <th>Data de Emprestimo</th>
                    <th>Data de Previsão Entrega</th>
                    <th>Data de Devolução</th>
                    <th>Status</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php
                    require "php/conexao.php";
                    $sql = "SELECT * FROM emprestimos ORDER BY data_emprestimo ASC";
                    // DESC É do mais recente para o mais antigo
                    // ASC É do mais antigo pro mais novo
                    $executando = mysqli_query($con, $sql);

                    if (mysqli_num_rows($executando) == 0) {
                        echo "<tr><td colspan=6>Nenhum Emprestimo Registrado!</td></tr>";
                    } else {
                        while ($linha = mysqli_fetch_array($executando)) {
                            echo "<tr>";
                            echo "<td>" . $linha['id_emprestimo'] . "</td>";
                            echo "<td>" . $linha['usuario_emprestimo'] . "</td>";
                            echo "<td>" . $linha['obra_emprestimo'] . "</td>";
                            echo "<td>" . $linha['data_emprestimo'] . "</td>";
                            echo "<td>" . $linha['data_prevista_emprestimo'] . "</td>";
                            echo "<td>" . $linha['data_devolucao_emprestimo'] . "</td>";
                            if ($linha['data_prevista_emprestimo'] < date("Y-m-d")) {
                                echo "<td ><p class='atrasado'>ATRASADO</p></td>";
                            } else {
                                echo "<td><p class='ok'>OK</p></td>";
                            }
                            $id = $linha['obra_emprestimo'];
                            if ($linha['data_devolucao_emprestimo'] == null) {
                                echo "<td><button onclick='devolucao($id)'>Marcar Devolução</button></td>";
                            } else {
                                echo "<td><button onclick='jaDevolvido()'>🔒</button></td>";
                            }
                            echo "</tr>";
                            // echo "<tr><td><form method='POST'><p name='".$linha['obra_emprestimo']."' style='display:none;'>".$linha['obra_emprestimo']."</p><button>Marcar Devolução</button></form></td></tr>";
                        }
                    }


                    ?>
                </tbody>
            </table>
        </div>
        <div class="modalzinha-fundo" id='modalzinha-fundo' style='display: none;'>
            <div class="modalzinha">
                <form action="" method="POST" style='height: 350px;' id="form-modal">
                    <fieldset>
                        <legend>
                            <p>Marcar Devolução de Livro</p><button type='button' id="botao_fechar" onclick="fechar()">X</button>
                        </legend>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            require 'php/conexao.php';

                            $obra = $_POST['futuro_id_obra'];
                            $data_dev = $_POST['data_dev'];

                            $atualizando1 = "UPDATE emprestimos SET data_devolucao_emprestimo = '$data_dev' WHERE obra_emprestimo = $obra";
                            mysqli_query($con, $atualizando1);
                            $atualizando2  = "UPDATE obras SET emprestimo_obra = 0 WHERE id_obra = $obra";
                            mysqli_query($con, $atualizando2);

                            echo "<script>window.location.href='controle.php';</script>";
                        }
                        ?>
                        <div class="caixa-input">
                            <label for="">Obra Número:</label>
                            <input type="number" id="futuro_id_obra" name="futuro_id_obra">
                        </div>
                        <div class="caixa-input">
                            <label for="">Data de Devolução:</label>
                            <input type="date" name="data_dev" id="data_dev" value="<?php date_default_timezone_set('America/Sao_Paulo'); echo date("Y-m-d"); ?>">
                        </div>
                    </fieldset>
                    <div class="caixa-btn">
                        <button>Marcar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modalzinha-fundo" id='modalzinha-fundo21' style='display: none;'>
            <div class="modalzinha">
                <form action="" style='height: 150px;' id="form-modal">
                    <fieldset>
                        <legend style="width:100%">
                            Obra já devolvida anteriormente
                        </legend>

                    </fieldset>
                    <div class="caixa-btn">
                        <button type='button' onclick="fechar()">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="js/script.js" defer></script>
</body>

</html>