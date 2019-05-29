<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Produto - <?php echo $_SESSION['produtos'][$_GET['id']]['nome'] ?></title>
    <style>
        h2{
            font-size: 16px;
        }
        .produto{
            margin: 20px 0;
        }
        .produto a{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
        <div class="container">
    <section class="produto jumbotron">
            <div class="row">
                <div class="col-xs-12">
                    <a href="index.php" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                        Voltar para lista de produtos
                    </a>
                </div>
                <div class="col-md-5 col-xs-12">
                    <img class="img-responsive" src="<?php echo $_SESSION['produtos'][$_GET['id']]['foto'] ?>" alt="">
                </div>
                <div class="col-md-7 col-xs-12">
                    <h1><?php echo $_SESSION['produtos'][$_GET['id']]['nome'] ?></h1>
                    <h2>Categoria</h2>
                    <p><?php echo $_SESSION['produtos'][$_GET['id']]['categoria'] ?></p>
                    <h2>Descrição</h2>
                    <p><?php echo $_SESSION['produtos'][$_GET['id']]['descricao'] ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Quantidade em estoque</h2>
                            <p><?php echo $_SESSION['produtos'][$_GET['id']]['qtd'] ?></p>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h2>Preço</h2>
                            <p><b>R$<?php echo $_SESSION['produtos'][$_GET['id']]['preco'] ?></b></p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
    </section>
        </div>
    
</body>
</html>