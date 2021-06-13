<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP</title>
    </head>
    <body>

        <?php

            function calcularIR($salario){
                
                if($salario <= 1903.98){
                    return 0;
                }
                else if($salario < 2826.65){
                    return 7.5;
                }
                else if($salario < 3751.05){
                    return 15;
                }
                else if($salario < 4664.68){
                    return 22.5;
                }
                else{
                    return 27.5;
                }
            }

            $salario = 3000;

           echo "Com seu salario de $salario, você deve pagar " . calcularIR($salario) . "% de IR";
        ?>

    </body>
</html>