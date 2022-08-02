<?php

/**
 * Classe para controle de fluxo de tela e banco de dados
 */
class HomeController {

	private $model;

	public function __construct() {
		$this->model = new HomeModel();
	}

	public function index() {
		$this->title = 'Home';

		require ABSPATH . '/views/HomeView.php';
	}

	public function list() {

	}
}

?>