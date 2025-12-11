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
                <legend>Cadastro de Obra</legend>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require 'php/conexao.php';

                    $nome = $_POST['nome'];
                    $genero = $_POST['genero'];
                    $data = $_POST['data'];
                    $autor = $_POST['autor'];
                    $editora = $_POST['editora'];
                    $emprestimo = $_POST['emprestimo'];

                    $insert = "INSERT INTO obras(
                        nome_obra,
                        genero_obra,
                        data_obra,
                        autor_obra,
                        editora_obra,
                        emprestimo_obra
                    )VALUES(
                        '$nome',
                        '$genero',
                        '$data',
                        '$autor',
                        '$editora',
                        '$emprestimo'
                    );";

                    mysqli_query($con, $insert);
                    mysqli_close($con);

                    echo "<div class='sucesso'>Sucesso!</div>";
                }
                ?>
                <div class="caixa-input">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome da Obra" required>
                </div>
                <div class="caixa-input">
                    <label for="">Gênero:</label>
                    <!-- <input type="text" name="genero" id="genero" placeholder="Gênero" required> -->
                    <select name="genero" id="genero">
                        <option value="" disabled selected>Selecione um Gênero</option>
                        <option value="Fantasia">Fantasia</option>
                        <option value="Ficção Científica">Ficção Científica</option>
                        <option value="Romance">Romance</option>
                        <option value="Conto">Conto</option>
                        <option value="Fábula">Fábula</option>
                        <option value="Suspense/Mistério">Suspense/Mistério</option>
                        <option value="Terror">Terror</option>
                        <option value="Biografia">Biografia</option>
                    </select>
                </div>
                <div class="caixa-input">
                    <label for="">Data de Lançamento:</label>
                    <input type="date" name="data" id="data" required>
                </div>
                <div class="caixa-input">
                    <label for="">Autor:</label>
                    <select name="autor" id="autor">
                        <?php
                        require 'php/conexao.php';

                        $select = "SELECT * FROM autores";
                        $executando = mysqli_query($con, $select);

                        if (mysqli_num_rows($executando) == 0) {
                            echo "<option value='' disabled selected>Nenhum Autor Registrado!</option>";
                        } else {
                            echo "<option value='' disabled selected>Selecione o Autor</option>";
                            while ($linha = mysqli_fetch_array($executando)) {
                                echo "<option value='" . $linha['id_autor'] . "'>" . $linha['nome_autor'] . "</option>";
                            }
                        }
                        mysqli_close($con);
                        ?>
                    </select>
                </div>
                <div class="caixa-input">
                    <label for="">Editora:</label>
                    <select name="editora" id="editora">
                        <?php
                        require 'php/conexao.php';

                        $select = "SELECT * FROM editoras";
                        $executando = mysqli_query($con, $select);

                        if (mysqli_num_rows($executando) == 0) {
                            echo "<option value='' disabled selected>Nenhuma Editora Registrada!</option>";
                        } else {
                            echo "<option value='' disabled selected>Selecione a Editora</option>";
                            while ($linha = mysqli_fetch_array($executando)) {
                                echo "<option value='" . $linha['id_editora'] . "'>" . $linha['nome_editora'] . "</option>";
                            }
                        }
                        mysqli_close($con);
                        ?>
                    </select>
                </div>
                <div class='caixa-input' style="display: none;">
                    <label for="">Emprestimo:</label>
                    <input type="number" name="emprestimo" id="emprestimo" value="0">
                </div>
            </fieldset>
            <div class="caixa-btn">
                <button>Cadastrar</button>
            </div>
        </form>
    </main>
</body>

</html>