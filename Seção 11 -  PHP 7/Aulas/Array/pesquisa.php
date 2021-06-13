<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP</title>
    </head>
    <body>

        <?php
            //in_array()
            //array_search

            $lista_frutas = ['Banana', 'Maçã', 'Morango', 'Uva'];

            echo '<pre>';
            print_r($lista_frutas);

            //Retorna true  caso exista ou false caso contrario
            echo in_array('Maçã', $lista_frutas);
            //true -> texto 1
            //false -> texto = vazio

            echo '<br>';
            //Retorna o indeice do valor pesquisado, caso exista, caso contrario retona null (como texto vazio)
            echo array_search('Uva', $lista_frutas);

        ?>

    </body>
</html>
