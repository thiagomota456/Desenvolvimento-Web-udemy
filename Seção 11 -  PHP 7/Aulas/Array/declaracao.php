<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP</title>
    </head>
    <body>

        <?php
            echo "Array sequenciais (numericos):";
            //$lista_frutas = Array('banana', 'Maçã', 'Morango', 'Uva', 'Abacate');
            
            //ou
            
            $lista_frutas = ['banana', 'Maçã', 'Morango', 'Uva', 'Abacate'];

            $lista_frutas[] = 'Abacaxi';
            echo '<hr>';
            echo '<pre>';
            var_dump($lista_frutas);
            echo '<hr>';
            echo '<pre>';
            print_r($lista_frutas);


            echo '<hr>';
            echo '<pre>';
            echo $lista_frutas[3];

            echo '<hr>';
            echo "Associativos:";

            //Posso  usar a notação [] tmb
            $lista_frutas2 = Array('a' => 'banana', 
                                   'b' => 'Maçã',
                                   'c' => 'Morango', 
                                   'd' => 'Uva', 
                                   '2' => 'Abacate');



            $lista_frutas2['w'] = 'Abacaxi';
            echo '<hr>';
            echo '<pre>';
            var_dump($lista_frutas2);
            echo '<hr>';
            echo '<pre>';
            print_r($lista_frutas2);

            echo '<hr>';
            echo $lista_frutas2['c'];

            echo '<hr>';
            echo $lista_frutas2['2'];

        ?>

    </body>
</html>
