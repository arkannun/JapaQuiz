<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Japa Quiz</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                <p id="dados">kana </p>
                <input type="text" id="significado" name="significado">

            </section>

            <footer>
                Programado por Makswel F. Cunha -
                <a href="mailto:arkannun@gmail.com?Subject=Japa%20Quiz" target="_top">arkannun@gmail.com</a> - MCA - 2019
            </footer>
        </main>
        <script>
            window.onload = function(){

                document.body.querySelector("#significado").addEventListener("keydown",function (e){
                    if (e.keyCode===13){
                        gera(0);
                        e.preventDefault();
                    }
                });
            }


            function gera(palavra){
                let page = "gera.php";
                $.ajax ({
                    type: 'POST',
                    dataType: 'html',
                    url: page,
                    beforeSend: function () {
                     $("#dados").html ("Carregando...")   ;
                    },
                    data: {palavra: palavra},
                    success: function (msg) {
                        $("#dados").html(msg);
                    }
                });
            }

        </script>
    </body>
</html>


