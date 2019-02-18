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
                <h1>Listagem de Kanas</h1>
                <hr>
                <?php
                    header('Content-Type: text/html; charset=utf-8');

                    $kana = $_GET['kana'];

                    $servidor = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $banco = "japa";

                    $strcon = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Erro ao conectar ao banco de dados');

                    $sql  = "DELETE FROM japa WHERE kana=\"" . $kana . "\"";

                    $data = mysqli_query( $strcon,$sql );
                    echo "<h2>Kana " . $kana . " apagado!</h2>";
                    mysqli_close($strcon);
                ?>
            </section>

            <footer>
                Programado por Makswel F. Cunha -
                <a href="mailto:arkannun@gmail.com?Subject=Japa%20Quiz" target="_top">arkannun@gmail.com</a> - MCA - 2019
            </footer>
        </main>
    </body>
</html>

