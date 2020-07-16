<?php
require 'config.php';

$id = $_GET['id'];

$sql = $conexao->prepare("DELETE FROM convidados WHERE id = ?");
$sql->bindValue(1, $id);
$sql->execute();
?>
<script>window.location.href='pessoas.php';</script>
