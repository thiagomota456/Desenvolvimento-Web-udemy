<?php

    session_start(); 

    //Variavel que verifica se a aautenticaçãoa foi realizada
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuarios_perfil_id = null;

    $perfils = array( 1 => 'Administrativo', 2 => 'Usuario');

    //usuarios do sistema
    $usuarios_app = Array(
        array('id'=> 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('id'=> 2, 'email' => 'user@teste.com.br', 'senha' => '123456',  'perfil_id' => 1),
        array('id'=> 5, 'email' => 'thiagomota456@gmail.com', 'senha' => '123456', 'perfil_id' => 1),
        array('id'=> 3, 'email' => 'jose@teste.com.br', 'senha' => '123456',  'perfil_id' => 2),
        array('id'=> 4, 'email' => 'maria@teste.com.br', 'senha' => '123456',  'perfil_id' => 2
        )
    );

    foreach($usuarios_app as $usuario){

        if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $usuario['id'];
            $usuarios_perfil_id = $usuario['perfil_id'];
            
        }
    }

    if($usuario_autenticado){
        echo 'Usuario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuarios_perfil_id;
        header('Location: home.php');
    }
    else{
        echo 'Erro de autenticação';
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }

?>