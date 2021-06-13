<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP</title>
    </head>
    <body>

        <?php
            
            $numeros_sorteados = Array();
        
            for($i = 0; $i < 6; $i++){
                $numero_sorteado = rand(1,60);

                if(!in_array($numero_sorteado, $numeros_sorteados)){
                    $numeros_sorteados[] = $numero_sorteado;
                }
                else{
                    $i--;
                }
                
            }

            echo '<pre>';
            print_r($numeros_sorteados);



        ?>

    </body>
</html>
