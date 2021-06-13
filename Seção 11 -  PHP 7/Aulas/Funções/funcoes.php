<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP</title>
    </head>
    <body>

        <?php

            //void
            function exibirBoasVindas(){
                echo 'Bem vinso ao curso de PHP';
            }

            exibirBoasVindas();
            echo '<br>';

            function calcularAreaTerreno($largura, $comprimento){
                return  $largura * $comprimento;
            }

            echo calcularAreaTerreno(30,50);
        ?>

    </body>
</html>