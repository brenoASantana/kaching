<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Construção do pedido</legend>
        <input type="text" name="id_pedido" value="<?php echo $pedido; ?>">

        <input type="text" name="cliente" value="<?php echo $_SESSION['nome']; ?>">
        <input type="text" name="id_cliente" value="<?php echo $_SESSION['id']; ?>">

        <input type="text" name="produto" value="<?php echo $nomeProduto; ?>">
        <input type="text" name="id_produto" value="<?php echo $idProduto; ?>">

        <input type="submit" name="enviar" value="Cadastrar">
    </fieldset>
</form>