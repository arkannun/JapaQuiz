<?php
    header('Content-Type: text/html; charset=utf-8');
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "japa";

    $strcon = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Erro ao conectar ao banco de dados');

    $sql  = "SELECT * FROM japa;";

    $data = mysqli_query( $strcon,$sql );
    $arr=array();
    while( $l =$row = $data->fetch_assoc() )
    {
        array_push($arr, $l['kana']);
    }
    mysqli_close($strcon);

    $max = sizeof($arr) - 1;
    echo $arr[rand(0,$max)];
?>
