<?php

namespace App\Controllers {

    use Silex\Application;

    class HomeController extends Controller {

        public function index(Application $app) {
			return $app["twig"]->render("home/index.html.twig");
        }

        public function hello(Application $app, $name) {
			
            return $app["twig"]->render("home/hello.html.twig", array(
				'name' => $name,
			));
        }
		
		protected function connectMethods() {
			
			$this->controllerName = 'home';
			
			$this->methods = array(
				'/' => 'index',
				'/hello-{name}' => 'hello'
			);
		}
    }
}
