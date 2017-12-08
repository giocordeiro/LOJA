<!-- ## !!ADICIONE O CABECALHO E O RODAPE PARA ESTA PAGINA -->
<!-- Use o controladorProduto.php para encaminhar os dados do seu cadastro -->
<?php require_once "cabecalho.php"; ?>

<h2>Cadastro de Produtos</h2>
<form action="../../controllers/controladorProduto.php?acao=cadastrar" method="post">
    <div class="form-group">
        <label for="produto">Produto:</label>
        <input name="nome" type="text" class="form-control" id="nome" aria-describedby="nome produto" placeholder="">
    </div>

    <div class="form-group">
        <label for="preco">Preço</label>
        <input name="preco" type="number" step="0.01" class="form-control" id="preco" placeholder="">
    </div>

    <div class="form-group">
        <label for="estoque">Estoque</label>
        <input name="estoque" type="number" class="form-control" id="estoque" placeholder="">
    </div>

    <div class="form-group">
        <label for="Categoria">Categoria</label>
        <select name="categoria" class="form-control" id="Categoria">
            <option>Fruta</option>
            <option>Legume</option>
            <option>Hortaliça</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>

<?php require_once "rodape.php";?>