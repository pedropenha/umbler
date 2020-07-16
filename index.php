<?php require 'config.php'; ?>

<html lang="pt-br">
<head>
    <title>B2Y</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">B2Y</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Lista de compras</a>
            <a class="nav-item nav-link" href="pessoas.php">Inserir convidados</a>
            <a class="nav-item nav-link" href="pagamento.php">Total a pagar</a>
        </div>
    </div>
</nav>
<br/><br/>
<div class="container">
    <form method="post">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome do produto" name="produto" required>
            </div>
            <div class="col">
                <input type="number" class="form-control" placeholder="Preço" name="preco" step=any required>
            </div>
            <div class="col">
                <input type="number" class="form-control" placeholder="Quantidade" name="quantidade" required>
            </div>
        </div>
        <br/><br/>
        <input type="submit" value="Adicionar produto" class="btn btn-info">
    </form>
    <?php
    if(isset($_POST['produto']) && isset($_POST['preco']) && isset($_POST['quantidade'])){
        $db = $conexao->prepare("INSERT INTO lista(produto, preco, qnt) VALUES (?,?,?)");
        $db->bindValue(1, addslashes($_POST['produto']));
        $db->bindValue(2, addslashes($_POST['preco']));
        $db->bindValue(3, addslashes($_POST['quantidade']));
        $db->execute();
    }
    ?>
    <br/><br/>
    <h3>Produtos cadastrados</h3>
    <br/>
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Nome do produto</th>
                <th scope="col">Preço Unit.</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço total</th>
                <th scope="col">Comprado?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $db = $conexao->prepare("SELECT * FROM lista");
            $db->execute();
            $total = 0;
            foreach ($db->fetchAll() as $item){
                ?>
                <tr>
                    <td><?php echo $item['produto']; ?></td>
                    <td>R$ <?php echo $item['preco']; ?></td>
                    <td><?php echo $item['qnt']; ?></td>
                    <td>R$ <?php echo $preco_total = $item['qnt'] * $item['preco'];?></td>
                    <?php
                    if($item['comprado'] == 0){
                        ?>
                        <td><a class="btn btn-danger" href="estado.php?id=<?php echo $item['id'];?>">NAO</a></td>
                        <?php
                    }else{
                        ?>
                        <td><a class="btn btn-success" href="estado.php?id=<?php echo $item['id'];?>">SIM</a></td>
                        <?php
                    }?>
                </tr>
                <?php
                $total += $preco_total;
            }
            ?>
            </tbody>
        </table>
    </div>

    <h3>Total dos produtos</h3>
    <br/>
    <div class="alert alert-success" role="alert">
        <?php echo "<h4>R$ ".$total."</h4>"?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/07fcf1727f.js"></script>
</body>
</html>