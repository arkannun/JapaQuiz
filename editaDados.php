<?php
    header('Content-Type: text/html; charset=utf-8');

    $kana = $_POST['kana'];
    $kanav = $_POST['kanav'];
    $significado = $_POST['significado'];
    $pronuncia = $_POST['pronuncia'];
    $numTraco = $_POST['numTraco'];
    $grade = $_POST['grade'];

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "japa";

    $strcon = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Erro ao conectar ao banco de dados');

    $sql = "UPDATE japa SET ";
    $sql .= "kana = '"        . $kana        .  "',";
    $sql .= "pronuncia = '"   . $pronuncia   .  "',";
    $sql .= "significado = '" . $significado .  "',";
    $sql .= "numTraco = '"    . $numTraco    .  "',";
    $sql .= "grade = '"       . $grade       .  "'" ;
    $sql .= "WHERE kana = '"  . $kanav       .  "';";
    mysqli_query($strcon,$sql) or die("Erro ao tentar editar o  registro");
    mysqli_close($strcon);

    header('Location: lista.php');
?>
