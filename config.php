<?php
try {
    $conexao = new PDO("mysql:host=mysql669.umbler.com;dbname=b2y2;", "asdqwepp", "asdqwePP58581230");
}catch (PDOException $e){
    echo $e;
} ?>