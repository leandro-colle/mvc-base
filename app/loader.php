<?php

/**
 * loader.php: inicia a sessão e carrega a aplicação
 */

// Evita que usuários acesse este arquivo diretamente
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Função para carregar automaticamente todas as /classes padrão: http://php.net/manual/pt_BR/function.autoload.php.
 * O nome de arquivos de classe devem ser o mesmo do objeto da classe.
 * Exemplo: classe Mvc, arquivo Mvc.php
 */
function __autoload($className) {
	$fileName = $className . '.php';

	$pathClasses = ABSPATH . '/classes/' . $fileName;
	$pathControllers = ABSPATH . '/controllers/' . $fileName;
	$pathModels = ABSPATH . '/models/' . $fileName;
	
	if (file_exists($pathClasses)) {
		require_once $pathClasses;
		return true;
	}

	if (file_exists($pathControllers)) {
		require_once $pathControllers;
		return true;
	}

	if (file_exists($pathModels)) {
		require_once $pathModels;
		return true;
	}

	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
	include ABSPATH . '/includes/404.php';
}

?>