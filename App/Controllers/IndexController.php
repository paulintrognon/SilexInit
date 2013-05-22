<?php

namespace App\Controllers {

    use Silex\Application;

    class IndexController extends Controller {

        public function index(Application $app) {
			return $app["twig"]->render("index/index.html.twig");
        }

        public function info() {
            return phpinfo();
        }
		
		protected function connectMethods() {
			
			$this->controllerName = 'index';
			
			$this->methods = array(
				'/' => 'index',
				'/info' => 'info'
			);
		}
    }
}
