<?php

class Route {

	private $controller;

	public function __construct($controller, $action = null, $data = []) {
		if (! $this->controller) {
			$this->callController($controller);
			$this->callAction($action, $data);
		}
	}

	private function callController($controller) {
		$controller = ucfirst(strtolower($controller)) . 'Controller';

		if (class_exists($controller)) {
			$this->controller = new $controller();
		}
	}

	private function callAction($action = null, $data = []) {
		if (is_null($action)) {
			$this->controller->index();
		} else {
			$response = $this->controller->{$action}($data);

			if (! is_null($response)) {
				echo json_encode(['data' => $response]);
			}
		}
	}
}

?>