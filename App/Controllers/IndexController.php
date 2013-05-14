<?php

namespace App\Controllers {

    use Silex\Application;
    use Silex\ControllerProviderInterface;


    class IndexController implements ControllerProviderInterface {


        public function index() { 
			return 'Bonjour';
        }


        public function info() {
            return phpinfo();
        }

        public function connect(Application $app) {
			
            // créer un nouveau controller basé sur la route par défaut
            $index = $app['controllers_factory'];
            $index->match("/", 'App\Controllers\IndexController::index');
            $index->match("/index", 'App\Controllers\IndexController::index');
            $index->match("/info", 'App\Controllers\IndexController::info');
			
            return $index;
        }
    }

}