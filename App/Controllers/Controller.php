<?php

namespace App\Controllers {

    use Silex\Application;
    use Silex\ControllerProviderInterface;


    abstract class Controller implements ControllerProviderInterface {
		
		protected $controllerName = '';
		protected $methods = array();

		public function __construct() {
			$this->connectMethods();
		}

		public function connect(Application $app) {
            // crée un nouveau controller basé sur la route indiquée dans App/routing.php
            $currentController = $app['controllers_factory'];
				
			$controllerClassName = get_class($this);
			$app['monolog']->addDebug('Nouveau controller : '.$controllerClassName);
			
			// Ajout des méthodes au controller, en associant les routes correspondantes
			foreach ($this->methods as $route => $method) {
				
				$currentController
					->match($route, $controllerClassName.'::'.$method)
					->bind($this->controllerName.'.'.$method);
			}
			
            return $currentController;
        }

        abstract protected function connectMethods();
    }
}
