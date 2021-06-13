<?php

 session_start();
 //Remover indices de sessão
 //unset()


 //destruir a variavel de sessão
 //session_destroy()
 session_destroy();
 header('Location: index.php');
?>