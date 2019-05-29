<?php

session_start();

if ($_POST) {
    if ($_FILES) {
        $destino = 'img/' . $_FILES['foto']['name'];

        $arquivo_tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file($arquivo_tmp, $destino);
    }
    $_POST['foto'] = $destino;
    $_SESSION['produtos'][] = $_POST;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Produtos</title>
    <style>
        * {
            border-radius: 0 !important;
        }

        .container {
            margin: 30px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-xs-12">
                <h1>Todos os produtos</h1>
                <br>
                <?php
                if (isset($_SESSION['produtos']) && $_SESSION['produtos']) {
                    ?>
                    <table class="table">
                        <tr>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                        </tr>
                        <?php
                        foreach ($_SESSION['produtos'] as $key => $produto) {
                            echo "<tr>";
                            echo "<td><a href='produto.php?id=" . $key . "'>" . $produto['nome'] . "</a></td>";
                            echo "<td>" . $produto['categoria'] . "</td>";
                            echo "<td>R$" . $produto['preco'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                <?php
            } else {
                echo "<div class='alert alert-info'>Ops, nenhum produto cadastrado</div>";
            }
            ?>
            </div>
            <div class="col-md-5 col-xs-12">
                <form class="jumbotron" enctype="multipart/form-data" action="index.php" method="POST">
                    <legend>Cadastrar produto</legend>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" class="form-control" required>
                            <option disabled selected>Selecione uma categoria</option>
                            <option value="camiseta">Camiseta</option>
                            <option value="calça">Calça</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="qtd">Quantidade</label>
                        <input type="number" name="qtd" id="qtd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="number" name="preco" id="preco" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto do produto</label>
                        <input type="file" name="foto">
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>