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
                <p id="dados">  </p>
                <p id="tipo" class="ptipo">   </p>
                <input type="text" id="significado" name="significado" autofocus="on">
                <p id="msg" class="msg"> </p>
                <p id="acertos" class="acertos"> </p>
                <p id="erros" class="erros"> </p>

            </section>

            <footer>
                Programado por Makswel F. Cunha -
                <a href="mailto:arkannun@gmail.com?Subject=Japa%20Quiz" target="_top">arkannun@gmail.com</a> - MCA - 2019
            </footer>
        </main>
        <script>

            arrJson="";
            tipo=0;
            acertos=0;
            erros=0;
            tentativasErro=0;



            function testa(){
                if(tipo==0){
                    if(document.querySelector("#significado").value == arrJason.significado){
                        acertos++;
                        tentativasErro=0;
                        gera(0);
                        document.querySelector("#msg").innerHTML="Meus parabéns!!!";
                        document.querySelector("#significado").value="";
                        document.querySelector("#significado").focus();
                    } else {
                        tentativasErro++;
                        erros++;
                        document.querySelector("#significado").value="";
                        document.querySelector("#significado").focus();
                        document.querySelector("#msg").innerHTML="Errou, tente novamente!";
                        if (tentativasErro>2){
                            document.querySelector("#msg").innerHTML="A tradução correta é: " + arrJason.significado;
                        }
                    }
                } else {
                    if(document.querySelector("#significado").value == arrJason.pronuncia){
                        acertos++;
                        tentativasErro=0;
                        gera(0);
                        document.querySelector("#msg").innerHTML="Meus parabéns!!!";
                        document.querySelector("#significado").value="";
                        document.querySelector("#significado").focus();
                    } else {
                        tentativasErro++;
                        erros++;
                        document.querySelector("#significado").value="";
                        document.querySelector("#significado").focus();
                        document.querySelector("#msg").innerHTML="Errou, tente novamente!";
                        if (tentativasErro>2){
                            document.querySelector("#msg").innerHTML="A tradução correta é: " + arrJason.pronuncia;
                        }
                    }

                }

                atualizaPlacar();
            }

            function gera(palavra){
                let page = "gera.php";
                $.ajax ({
                    type: 'POST',
                    dataType: 'json',
                    url: page,
                    data: {palavra: palavra},
                    success: function (msg) {
                        arrJason=(msg);
                        $("#dados").html(arrJason.kana);
                        tipo=Math.floor(Math.random() * Math.floor(2));
                        atualizaPlacar();
                    }
                });
            }


            function atualizaPlacar(){
                if(tipo==0){
                    document.querySelector("#tipo").innerHTML=`Qual a <b>tradução</b> deste kana?`;
                } else if (tipo==1){
                    document.querySelector("#tipo").innerHTML=`Qual a <b>pronuncia</b> deste kana?`;
                }
                document.querySelector("#acertos").innerHTML=`Acertos: ${acertos}`;
                document.querySelector("#erros").innerHTML=`Erros: ${erros}`;
            }

            window.onload = function(){
                gera(0);
                document.body.querySelector("#significado").addEventListener("keydown",function (e){
                    if (e.keyCode===13){
                        testa();
                        e.preventDefault();
                    }
                });
            }




        </script>
    </body>
</html>


