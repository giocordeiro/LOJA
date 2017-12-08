<?php


    //seguranca
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); //consulte os slides.


    require_once "../models/CrudProdutos.php";

    $crud = new CrudProdutos();

    $produto = $crud->getProduto($id);




?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lojão do IFC</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ifc-style.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="../../assets/imagens/logo.png" alt="" width="80px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br /><br /><br /><br /><br /><br /><br /><br />
<!-- Page Content -->
<div class="container product-content">

    <?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success">
        <?= $_GET['msg'] ?>
    </div>
    <?php endif; ?>

    <!-- Page Features -->
    <div class="row">

        <div class="col-md-5">
            <img src="../../assets/imagens/product-default.png" alt="" class="img-fluid">
        </div>

        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <h2><?= $produto->nome ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class="badge badge-primary">Mostre a categoria</span>
                    <span class="badge badge-warning">Mostre a disponibilidade</span>
                </div>
            </div>
            <!-- end row -->

            <div class="row description-wrapper">
                <div class="col-md-12">
                    <p class="description">Consectetur adipisicing elit. Accusantium ad, adipisci commodi delectus ea eius eligendi expedita in ipsum magnam modi mollitia nisi, obcaecati perspiciatis quae quo repellendus temporibus velit.
                    </p>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-12 bottom-rule">
                    <h2 class="product-price">Mostre o preço</h2>
                </div>
            </div>
            <!-- end row -->

            <form action="../controllers/controladorProduto.php?acao=comprar" method="post">

            <div class="row add-to-cart">
                <div class="col-md-5 product-qty">
                    <input name="Quantidade" class="btn btn-default btn-lg btn-qty" value="1" />
                    <input name="id" type="hidden" value="<?= $produto->id ?>">

                    <?php if ($produto->estoque > 0) { ?>

                    <button class="btn btn-lg btn-brand btn-full-width">Comprar</button>

                <?php }else{ ?>
                    <button class="btn btn-lg btn-brand btn-full-width disabled">Comprar</button>

                    <?php } ?>

                </div>
            </div><!-- end row -->
                <h2><?= $produto->estoque?></h2>
            </form>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Instituto Federal Catarinense de Educação, Ciência e Tecnologia</p>
    </div>
    <!-- /.container -->
</footer>

</body>

</html>
