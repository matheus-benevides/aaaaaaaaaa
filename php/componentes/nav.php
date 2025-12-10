<?php
    $ativo = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <div class="nav-header">
        <h4>BIBLIOTECA</h4>
    </div>
    <div class="nav-links">
        <a href="index.php" class="<?php if($ativo == "index.php") echo "ativo";?>">Home</a>
        <a href="cadastro_usuario.php" class="<?php if($ativo == "cadastro_usuario.php") echo "ativo";?>">Cadastro de Usuário</a>
        <a href="cadastro_obra.php" class="<?php if($ativo == "cadastro_obra.php") echo "ativo";?>">Cadastro de Obras</a>
        <a href="cadastro_emprestimo.php" class="<?php if($ativo == "cadastro_emprestimo.php") echo "ativo";?>">Cadastro de Emprestimos</a>
        <a href="cadastro_devolucao.php" class="<?php if($ativo == "cadastro_devolucao.php") echo "ativo";?>">Cadastro de Devolução</a>
        <a href="controle.php" class="<?php if($ativo == "controle.php") echo "ativo";?>">Controle</a>
    </div>
</nav>