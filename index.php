<?php
    //HTTP -> saber os idiomas selecionados no navegador
    $lingua = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lingua){
        case 'en':
            header('location: en-us/');
            break;
        case 'pt':
            header('location: pt-br/');
            break;
        default:
			header('location: en-us/');
            break;
    }
?>