<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Japa Quiz</title>
        <link href="_css/estilo.css" rel="stylesheet">
        <style>
            table {

                margin: auto;
                text-align: center;
            }


            td {

                background-color: #dddddd;
                padding: 3px;


            }

            th {
                text-align: center;
                padding: 8px;
                background-color: #262D38;
                color: white;
            }

            .apagar {
                text-decoration: none;
                color: white;
            }
        </style>
    </head>
    <body>
        <main>
            <header>
                <nav>
                    <ul>
                        <li><a href="index.html">Quiz</a></li>
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
                    $servidor = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $banco = "japa";

                    $strcon = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Erro ao conectar ao banco de dados');

                    $sql  = "SELECT * FROM japa;";

                    $data = mysqli_query( $strcon,$sql );
                    echo "<table><tr><th>Kana</th><th>Pronuncia</th><th>Significado</th><th>Num. Traços</th><th>Grade</th><th>  </th></tr>";
                    while( $l =$row = $data->fetch_assoc() )
                    {
                        echo "<tr><td>" . $l['kana'] . "</td><td>" . $l['pronuncia'] . "</td><td>" . $l['significado'] . "</td><td>" . $l['numTraco'] .  "</td><td>" . $l['grade'] . "</td><th><a class=\"apagar\" href=\"deleta.php?kana=" . $l['kana'] . "\">Apagar</a></th></tr>";
                    }
                    echo "</table>";
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
