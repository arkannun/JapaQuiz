<?php
    header('Content-Type: text/html; charset=utf-8');

    $kana = $_POST['kana'];
    $significado = $_POST['significado'];
    $pronuncia = $_POST['pronuncia'];
    $numTracos = $_POST['numTracos'];
    $grade = $_POST['grade'];

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "japa";

    $strcon = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Erro ao conectar ao banco de dados');

    $sql = "INSERT INTO japa VALUES ( ";
    $sql .= "'" .$kana .  "',";
    $sql .= "'" . $significado .  "',";
    $sql .= "'" . pronuncia .  "',";
    $sql .= "'" . $numTracos .  "',";
    $sql .= "'" . $grade .  "'";
    $sql .= ");";
    mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
    mysqli_close($strcon);

    header('Location: cadastro.html');
?>
