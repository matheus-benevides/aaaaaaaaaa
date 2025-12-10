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
                </thead>
                <tbody>
                    <?php
                    require "php/conexao.php";
                    $sql = "SELECT * FROM emprestimos ORDER BY data_devolucao_emprestimo DESC";
                    $executando = mysqli_query($con, $sql);

                    if (mysqli_num_rows($executando) == 0) {
                        echo "<tr><td colspan=6>Nenhum Emprestimo Registrado!</td></tr>";
                    } else {
                        while ($linha = mysqli_fetch_array($executando)) {
                            echo "<tr><td>" . $linha['id_emprestimo'] . "</td></tr>";
                            echo "<tr><td>" . $linha['usuario_emprestimo'] . "</td></tr>";
                            echo "<tr><td>" . $linha['obra_emprestimo'] . "</td></tr>";
                            echo "<tr><td>" . $linha['data_emprestimo'] . "</td></tr>";
                            echo "<tr><td>" . $linha['data_prevista_emprestimo'] . "</td></tr>";
                            echo "<tr><td>" . $linha['data_devolucao_emprestimo'] . "</td></tr>";
                            // echo "<tr><td><form method='POST'><p name='".$linha['obra_emprestimo']."' style='display:none;'>".$linha['obra_emprestimo']."</p><button>Marcar Devolução</button></form></td></tr>";
                        }
                    }


                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>