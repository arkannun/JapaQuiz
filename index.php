<?php
    header('Content-Type: text/html; charset=utf-8');
    $servidor = "localhost";
    $usuario  = "root";
    $senha    = "";
    $banco    = "japa";

    $arrKana        = array();
    $arrSignificado = array();
    $arrPronuncia   = array();
    $arrNumTraco    = array();
    $arrGrade       = array();

    $strcon = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Erro ao conectar ao banco de dados');

    $sql  = "SELECT * FROM japa;";

    $data = mysqli_query( $strcon,$sql );

    while( $l =$row = $data->fetch_assoc() )
    {
        array_push($arrKana,        $l['kana']);
        array_push($arrPronuncia,   $l['pronuncia']);
        array_push($arrSignificado, $l['significado']);
        array_push($arrNumTraco,    $l['numTraco']);
        array_push($arrGrade,       $l['grade']);
    }
    mysqli_close($strcon);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Japa Quiz</title>
        <link href="_css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <header>
                <nav>
                    <ul>
                        <li><a href="index.php">Quiz</a></li>
                        <li><a href="cadastro.html">Cadastro</a></li>
                        <li><a href="lista.php">Lista</a></li>
                    </ul>
                </nav>
            </header>

            <section>




                <h1>Japa Quiz</h1>
                <p>kana </p>
                <input type="text" id="significado" name="significado">

            </section>

            <footer>
                Programado por Makswel F. Cunha -
                <a href="mailto:arkannun@gmail.com?Subject=Japa%20Quiz" target="_top">arkannun@gmail.com</a> - MCA - 2019
            </footer>
        </main>
        <script>
            let indice=0;
            let max=<?php echo sizeof($arrKana) ?>;
            let arrKana = [];
            window.onload = function(){
                document.body.querySelector("#significado").addEventListener("keydown",function (e){
                    if (e.keyCode===13){
                        if (checa()){
                            indice = geraRandom(max);
                            atualizaKana();
                        } else {

                        }
                        e.preventDefault();
                    }

                });

                inicializaVetores();

            }

            function geraRandom(max){
                return Math.floor(Math.random() * Math.floor(max));
            }

            function checa(){
                alert(`max = ${max}`);
                return true;
            }

            function atualizaKana(){
                document.querySelector("p").innerHTML =
            }

             function inicializaVetores(){
                 for(let i=0;i<max;i++){
                     arrKana.push(`<?php echo $arrKana[${i}] ?>`);
                 }
                 alert(arrKana[0]);
             }
        </script>
    </body>
</html>


