<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP</title>
    </head>
    <body>

        <?php

            //recuperação da data atual
            echo date('d/m/Y H:i');

            //Pegar timezone atual
            echo '<br/>';
            echo date_default_timezone_get();

            date_default_timezone_set('America/Sao_Paulo');

            //Tem que ser no padrão americano d e data

            $data_Inicial = '2018-04-24';
            $data_FInal =  '2020-05-23';

            //timestamp
            //01/01/1970 --- 2018-04-24

            $time_inicial = strtotime($data_Inicial);
            $time_final = strtotime($data_FInal);

            echo '<br><hr>';

            echo $data_Inicial . ' - ' . $time_inicial;
            echo '<br>';
            echo $data_FInal . ' - ' . $time_final;

            $difereca_times = $time_final - $time_inicial;

            echo '<br>';

            echo "A diferença de segundos entre a data inicial e a data final é de $difereca_times";

            $segundos_em_um_dia = 24 * 60 * 60;

            echo "Um dia possui $segundos_em_um_dia";

            echo '<br>';

            echo "A diferença entre $data_Inicial e $data_FInal é de " . $difereca_times/$segundos_em_um_dia . " dias"
        ?>

    </body>
</html>