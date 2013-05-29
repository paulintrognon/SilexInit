<?php

namespace App\Controllers {

    use Silex\Application;

    class ExecuteController extends Controller {

        public function language(Application $app, $language) {
			$app['session']->set('current_language', $language);
			return $app->redirect($_SERVER['HTTP_REFERER']);
        }
		
		protected function connectMethods() {
			
			$this->controllerName = 'execute';
			
			$this->methods = array(
				'/language/{language}' => 'language'
			);
		}
    }
}
