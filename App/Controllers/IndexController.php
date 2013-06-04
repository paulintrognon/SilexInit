<?php

namespace App\Controllers {

    use Silex\Application;

    class IndexController extends Controller {

        public function home(Application $app) {
			return $app["twig"]->render("index/index.html.twig");
        }
		
		protected function connectMethods() {
			
			$this->controllerName = 'index';
			
			$this->methods = array(
				'/' => 'home'
			);
		}
    }
}
