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
                <legend>Cadastro de Usuário</legend>
                <?php
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        require 'php/conexao.php';

                        $nome = $_POST['nome'];
                        $cpf = $_POST['cpf'];
                        $endereco = $_POST['endereco'];
                        $telefone = $_POST['telefone'];

                        $cpfVeri = "SELECT * FROM usuarios WHERE cpf_usuario = '$cpf'";
                        $rodando = mysqli_query($con,$cpfVeri);
                        if(mysqli_num_rows($rodando) == 0){
                        
                            $nomeVeri = "SELECT * FROM usuarios WHERE nome_usuario = '$nome'";
                            $rodando2 = mysqli_query($con,$nomeVeri);

                            if(mysqli_num_rows($rodando2) == 0){
                                $inserindo = "INSERT INTO usuarios(nome_usuario,cpf_usuario,endereco_usuario,telefone_usuario)VALUES('$nome','$cpf','$endereco','$telefone')";
                                mysqli_query($con,$inserindo);
                                echo "<div class='sucesso'><p>Sucesso!</p></div>";
                            } else{
                                echo "<div class='erro'><p>Nome de Usuário já registrado!</p></div>";
                            }
                        }else{
                            echo "<div class='erro'><p>CPF de Usuário já registrado!</p></div>";
                        }
                        mysqli_close($con);
                    }
                ?>
                <div class="caixa-input">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome de Usuário" required>
                </div>               
                <div class="caixa-input">
                    <label for="">CPF:</label>
                    <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required>
                </div>               
                <div class="caixa-input">
                    <label for="">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" placeholder="R. Exemplo, 001" required>
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