<?php
require 'config.php';
$sql = $conexao->prepare("SELECT comprado FROM lista WHERE id = ?");
$sql->bindValue(1,$_GET['id']);
$sql->execute();

foreach ($sql->fetchAll() as $item){}

if($item['comprado'] == '0') {
    $sql = $conexao->prepare("UPDATE lista SET comprado = ? WHERE id = ?");
    $sql->bindValue(1, 1);
    $sql->bindValue(2, $_GET['id']);
    $sql->execute();
    ?>
    <script>
        window.location.href='index.php'
    </script>
    <?php
}else{
    $sql = $conexao->prepare("UPDATE lista SET comprado = ? WHERE id = ?");
    $sql->bindValue(1, 0);
    $sql->bindValue(2, $_GET['id']);
    $sql->execute();
    ?>
    <script>
        window.location.href='index.php'
    </script>
    <?php
}

