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

                    // $sql = "SELECT * from emprestimos ORDER BY data_emprestimo ASC";

                    $sql = "SELECT emprestimos.id_emprestimo,
                        	   emprestimos.obra_emprestimo,
                        	   usuarios.nome_usuario,
                               obras.nome_obra,
                               emprestimos.data_emprestimo,
                               emprestimos.data_prevista_emprestimo,
                               emprestimos.data_devolucao_emprestimo
                        FROM
                        	emprestimos
                        INNER JOIN
                        	  usuarios ON emprestimos.usuario_emprestimo = usuarios.id_usuario
                        INNER JOIN
                              obras ON emprestimos.obra_emprestimo = obras.id_obra
                         ORDER BY data_emprestimo ASC";
                    // DESC É do mais recente para o mais antigo
                    // ASC É do mais antigo pro mais novo
                    $executando = mysqli_query($con, $sql);

                    while ($linha = mysqli_fetch_array($executando)) {
                        echo "<tr>";
                        echo "<td>" . $linha['id_emprestimo'] . "</td>";
                        // echo "<td>" . $linha['usuario_emprestimo'] . "</td>";
                        echo "<td>" . $linha['nome_usuario'] . "</td>";
                        // echo "<td>" . $linha['obra_emprestimo'] . "</td>";
                        echo "<td>" . $linha['nome_obra'] . "</td>";
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
                            echo "<td>🔒</td>";
                        }
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
        <div class="modalzinha-fundo" id='modalzinha-fundo' style='display: none;'>
            <div class="modalzinha">
                <form action="" method="POST" style='height: 350px;' id="form-modal">
                    <fieldset>
                        <legend style="justify-content: space-between">
                            <p>Marcar Devolução de Livro</p><button type='button' id="botao_fechar" onclick="document.getElementById('modalzinha-fundo').style.display='none'">X</button>
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
                        <div class="caixa-input" style="display: none;">
                            <label for="">Obra Número:</label>
                            <input type="number" id="futuro_id_obra" name="futuro_id_obra">
                        </div>
                        <div class="caixa-input">
                            <label for="">Data de Devolução:</label>
                            <input type="date" name="data_dev" id="data_dev">
                        </div>
                    </fieldset>
                    <div class="caixa-btn">
                        <button>Marcar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="js/script.js" defer></script>
</body>

</html>