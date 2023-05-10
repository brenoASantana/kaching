<?php include('conexao.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Pedidos</title>
    <link rel="stylesheet" type="text/css" href="../view/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../view/css/style.css">
    <link rel="stylesheet" type="text/css" href="../view/css/fonts-icones.css">
</head>

<body>
    <h1>Geração de pedidos</h1>
    <center>
        <img src="../view/css/img/LogoKaching.png" alt="LogoKaching" width="248" height="248">
    </center>
    <!-- ESSE BOTÃO TEM A FINALIDADE CRIAR UM NUMERO DE PEDIDO. ENVIA VIA POST PARA A PROPRIA PAGINA-->
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

        <input type="hidden" name="aux" value="1">
        <input type="submit" name="novopedido" value="Novo Pedido">

    </form>

    <!-- FUNÇÃO DE INCLUIR UM VALOR NA TABELA AUX PARA GERAR NUMERO DE PEDIDO. (LINHA 71) -->
    <?php
    if (isset($_POST['aux'])) {

        $aux = $_POST['aux'];
        $sql = "INSERT INTO aux(id_aux) VALUES ('$aux')";
        if ($conn->query($sql) === FALSE) {
            echo "erro ao incluir " . $conn->error;
        }

        $sql = "SELECT id_aux FROM aux";
        mysqli_query($conn, $sql);
        $_SESSION['pedido'] =  mysqli_affected_rows($conn);
        $pedido = $_SESSION['pedido'] + 1;
    }

    ?>

    <!-- FORMULARIO PARA PESQUISAR O CLIENTE CPF -->
    <form method="GET" action="<?php $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <label>Cliente CPF:</label>
            <input type="text" name="cliente">
            <input type="submit" name="pesquisa" value="Pesquisar">
        </fieldset>
    </form>
    <!-- FORMULARIO PARA PESQUISAR O PRODUTO CODIGO -->
    <form method="GET" action="<?php $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <label>Codigo Produto:</label>
            <input type="text" name="produto">
            <input type="submit" name="pesquisa" value="Pesquisar">
        </fieldset>
    </form>
    <?php

    if (isset($_GET['cliente'])) {
        $cpf = $_GET['cliente'];
        $sql = "SELECT id, nome FROM clientes WHERE cpf = '$cpf'";
        $resultado = $conn->query($sql);

        $linha = $resultado->fetch_assoc();
        /*$nomeCliente = $linha['nome'];
    $idCliente = $linha['id'];*/

        $_SESSION['nome'] = $linha['nome'];
        $_SESSION['idcliente'] = $linha['id'];
    }

    if (isset($_GET['produto'])) {
        $codigo = $_GET['produto'];
        $sql = "SELECT produto.id as id_produto, produto.nome as produto, tb_precos.valor as valor FROM produto INNER JOIN tb_precos on produto.id = tb_precos.id_produto WHERE codigo = '$codigo'";
        $resultado = $conn->query($sql);

        $linha = $resultado->fetch_assoc();
        $_SESSION['produto'] = $linha['produto'];
        $_SESSION['id_produto'] = $linha['id_produto'];
        $_SESSION['valor'] = $linha['valor'];
    }


    ?>

    <?php

    //var_dump($_SESSION);   
    ?>

    <form>
        <label>Pedido: </label>
        <input type="text" name="pedido" value="<?php echo $_SESSION['pedido'] ?>" readonly>
        <label>Cliente:</label>
        <input type="text" name="cliente" value="<?php echo $_SESSION['nome'] ?>" readonly>
        <label>Produto</label>
        <input type="text" name="produto" value="<?php echo $_SESSION['produto'] ?>" readonly>
        <label>Valor</label>
        <input type="text" name="valor" value="<?php echo $_SESSION['valor'] ?>" readonly>
        <label>Quantidade</label>
        <input type="quantidade" name="quantidade">
        <label>Prevenda?</label>
        <input type="checkbox" name="prevenda">
        <br><br>
        <input type="submit" name="cadastro" value="Cadastrar">
        <br><br>
        <a href="../index.php" class="btn-excluir">Sair</a>
    </form>

</body>

</html>