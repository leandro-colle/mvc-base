<?php

/** 
 * index.php: ponto inicial da aplicação 
 */

require_once 'config.php';

// Inicia a sessão
session_start();

$route = new Route($_GET['controller'], $_GET['action'], $_POST['data']);

?>