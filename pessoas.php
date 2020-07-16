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
            <a class="nav-item nav-link active" href="pessoas.php">Inserir convidados</a>
            <a class="nav-item nav-link" href="pagamento.php">Total a pagar</a>
        </div>
    </div>
</nav>

<div class="container">
    <br/><br/>
    <form method="post">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome da pessoa" name="nome" required>
            </div>
        </div>
        <br/><br/>
        <input type="submit" value="Cadastrar Pessoa" class="btn btn-success">
    </form>
    <?php
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $sql = $conexao->prepare("INSERT INTO convidados(nome) VALUES (?);");
        $sql->bindValue(1, $_POST['nome']);
        $sql->execute();
    }
    ?>
    <br/><br/>
    <h3>Pessoas</h3>
    <br/>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Nome da pessoa</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $db = $conexao->prepare("SELECT id,nome FROM convidados");
        $db->execute();

        foreach ($db->fetchAll() as $item){
            ?>
            <tr>
                <td><?php echo $item['nome']; ?></td>
                <td><a href="excluir.php?id=<?php echo $item['id']?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <h3>Total de convidados</h3>
    <br/>
    <div class="alert alert-success" role="alert">
        <?php $pessoas = $db->rowCount() + 1;
        echo "<h4>".$pessoas." Pessoas</h4>";?>
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