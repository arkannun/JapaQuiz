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
                <h1>Editor de Kanas</h1>

                <?php
                    header('Content-Type: text/html; charset=utf-8');

                    $kana = $_GET['kana'];
                    $kanav = $_GET['kana'];
                    $servidor = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $banco = "japa";

                    $strcon = mysqli_connect($servidor,$usuario,$senha,$banco) or die('Erro ao conectar ao banco de dados');

                    $sql  = "SELECT * FROM japa WHERE kana=\"" . $kana . "\"";

                    $data = mysqli_query( $strcon,$sql );

                    $l =$row = $data->fetch_assoc();

                    $pronuncia = $l['pronuncia'];
                    $significado = $l['significado'];
                    $numTraco = $l['numTraco'];
                    $grade = $l['grade'];
                    mysqli_close($strcon);
                ?>


                <form autocomplete="off" action="editaDados.php" method="POST" name="frmCadKana">
                    <label for="kana">Ideograma</label>
                    <input type="text" id="kana" name="kana" autofocus="on" value="<?php echo $kana ?>">

                    <label for="pronuncia">Pronuncia</label>
                    <input type="text" id="pronuncia" name="pronuncia" value="<?php echo $pronuncia ?>">

                    <label for="significado">Significado</label>
                    <input type="text" id="significado" name="significado" value="<?php echo $significado ?>">

                    <label for="numTraco">Número de Traços</label>
                    <input type="text" id="numTraco" name="numTraco" value="<?php echo $numTraco ?>">

                    <label for="grade">Grade</label>
                    <input type="text" id="grade" name="grade" value="<?php echo $grade ?>">

                    <input style="visibility: hidden;" type="text" value="<?php echo $kanav ?>" name="kanav" id="kanav">

                    <input type="button" value="Gravar" id="gravar" name="gravar" onclick="confirma()">
                </form>
            </section>

            <footer>
                Programado por Makswel F. Cunha -
                <a href="mailto:arkannun@gmail.com?Subject=Japa%20Quiz" target="_top">arkannun@gmail.com</a> - MCA - 2019
            </footer>
        </main>
        <script>
            let inp = document.querySelectorAll("input");
            window.onload = function(){
                for (let i=0;i<inp.length-1;i++){
                    inp[i].addEventListener("keydown",function (e){
                        if (e.keyCode===13){
                            if (i!=4){
                                inp[i+1].focus();
                            } else {
                                confirma();
                            }
                            e.preventDefault();
                        }
                    });
                }
            }


            function confirma(){
                if (confirm("Deseja salvar este kana?")){
                    document.frmCadKana.submit();
                }
            }
        </script>
    </body>
</html>
