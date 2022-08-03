<?php

/** 
 * index.php: ponto inicial da aplicação 
 */

require_once 'config.php';

// Inicia a sessão
session_start();

$controller = null;
$action = null;

list($controller, $action) = explode('/', $_GET['path']);

$route = new Route($controller, $action, $_POST['data']);

?>