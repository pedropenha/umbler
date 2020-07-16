<?php require 'config.php'; ?>
<html lang="pt-br">
<head>
    <title>B2Y</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">B2Y</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">Inserir produtos</a>
            <a class="nav-item nav-link" href="pessoas.php">Inserir convidados</a>
            <a class="nav-item nav-link active" href="pagamento.php">Total a pagar</a>
        </div>
    </div>
</nav>
<div class="container">
    <br/><br/>
    <form method="post">
        <div class="row">
            <div class="col">
                <select name="nome" class="form-control">
                    <option>Escolha um convidado</option>
                    <?php
                    $sql = $conexao->prepare("SELECT nome FROM convidados");
                    $sql->execute();
                    foreach ($sql->fetchAll() as $item){
                        ?>
                        <option value="<?php echo $item['nome'];?>"><?php echo $item['nome'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <select name="produto" class="form-control">
                    <option>Selecione um produto</option>
                    <?php
                    $sql = $conexao->prepare("SELECT id,produto FROM lista");
                    $sql->execute();
                    foreach ($sql->fetchAll() as $item){
                        ?>
                        <option value="<?php echo $item['id'];?>"><?php echo $item['produto'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <br/><br/>
        <input class="btn btn-info" type="submit">
    </form>
    <?php
    if(isset($_POST['nome']) && isset($_POST['produto'])){
        $sql = $conexao->prepare("SELECT preco, qnt, dividido FROM lista WHERE id = ?");
        $sql->bindValue(1, $_POST['produto']);
        $sql->execute();

        foreach ($sql->fetchAll() as $item){}

        $sql = $conexao->prepare("INSERT INTO pedidos(nome, produto, preco, dividido) VALUES (?,?,?,?)");
        $sql->bindValue(1, $_POST['nome']);
        $sql->bindValue(2, $_POST['produto']);
        $sql->bindValue(3, $item['preco'] * $item['qnt']);
        $sql->bindValue(4, $item['dividido']);
        $sql->execute();
    }
    ?>
    <br/><br/>
    <h4>Pesquisar quanto ficou</h4>
    <form method="post">
        <div class="row">
            <div class="col">
                <select name="nome" class="form-control">
                    <option>Escolha um convidado</option>
                    <?php
                    $sql = $conexao->prepare("SELECT nome FROM convidados");
                    $sql->execute();
                    foreach ($sql->fetchAll() as $item){
                        ?>
                        <option value="<?php echo $item['nome'];?>"><?php echo $item['nome'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <input type="submit" value="Pesquisar" class="btn btn-success">
            </div>
        </div>
    </form>
    <br/>
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <?php
                $sql = $conexao->prepare("SELECT produto FROM lista");
                $sql->execute();
                foreach ($sql->fetchAll() as $item) {
                    ?>
                    <th scope="col"><?php echo $item['produto']; ?></th>
                    <?php
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            if(isset($_POST['nome'])){?>
                <td><?php echo $_POST['nome']; ?></td>
                <?php
                $sql = $conexao->prepare("SELECT * FROM pedidos WHERE nome = ?");
                $sql->bindValue(1, $_POST['nome']);
                $sql->execute();
                foreach ($sql->fetchAll() as $item) {
                    $valor = $item['preco']/$item['dividido'];
                    $total += $valor;
                    ?>
                    <td><?php echo $valor; ?></td>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <br/>
    <h3>Total dos produtos</h3>
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
</body>
</html>