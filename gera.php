<?php
    header('Content-Type: text/html; charset=utf-8');
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "japa";

    $strcon = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Erro ao conectar ao banco de dados');

    $sql  = "SELECT * FROM japa;";

    $data = mysqli_query( $strcon,$sql );

    $arrKana=array();
    $arrSignificado=array();
    $arrPronuncia=array();
    $arrNumTraco=array();
    $arrGrade=array();

    while( $l =$row = $data->fetch_assoc() )
    {
        array_push($arrKana,        $l['kana']);
        array_push($arrSignificado, $l['significado']);
        array_push($arrPronuncia,   $l['pronuncia']);
        array_push($arrNumTraco,    $l['numTraco']);
        array_push($arrGrade,       $l['grade']);
    }

    mysqli_close($strcon);

    $max = sizeof($arrKana) - 1;
    $indice = rand(0,$max);

    $json = "{\"kana\":\"" . $arrKana[$indice] . "\", \"significado\":\"" . $arrSignificado[$indice] . "\", \"pronuncia\":\"" . $arrPronuncia[$indice] . "\", \"numTraco\":" . $arrNumTraco[$indice] . ", \"grade\":" . $arrGrade[$indice] . "}";

    echo $json;
?>
