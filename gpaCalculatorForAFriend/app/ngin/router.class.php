<?php 
namespace App\Ngin;
/**
* phpNgin - simple PHP framework
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.0
*
* MIT LICENSE
*
* Permission is hereby granted, free of charge, to any person obtaining
* a copy of this software and associated documentation files (the
* "Software"), to deal in the Software without restriction, including
* without limitation the rights to use, copy, modify, merge, publish,
* distribute, sublicense, and/or sell copies of the Software, and to
* permit persons to whom the Software is furnished to do so, subject to
* the following conditions:
*
* The above copyright notice and this permission notice shall be
* included in all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
* EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
* MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
* NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
* LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
* OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
* WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

/**
* router
*/
class Router
{
	/**
	* Check if controller exists
	* @param array
	* @return array
	*/
	protected function checkController($page)
	{
		$controllerPath = __SITE_PATH . '/app/controllers/'.$page['page'].'.controller.php';
		
		if (file_exists($controllerPath)) {
			$controller = $page['controller'].'Controller';
			$return = [
				'check'=>"1", 
				'controllerPath'=>"$controllerPath",
				'controller'=>"$controller"
			];
		}
		else
		{
			$errorControllerPath = __SITE_PATH . '/app/controllers/nginControllers/error.controller.php';
			$return = [
				'check'=>"0", 
				'controllerPath'=>"$errorControllerPath",
				'controller'=>"ErrorController"
			];
		}
		return($return);
	}


	/**
	* Get controller
	* @param array
	*/
	protected function getController($page)
	{
		$page['controller'] = ucfirst($page['page']);
		$checkController = self::checkController($page);

		$baseController = __SITE_PATH . '/app/ngin/base.controller.class.php';
		include_once $baseController;

		switch ($checkController['check']) {
			case '1':
				include_once $checkController['controllerPath'];
				$controller = $checkController['controller'];
				$controller = new $controller();

				$view = __SITE_PATH . '/app/views/'.$page['page'].'.html.php';
				$controller->index($view);
			break;
			
			case '0':
				include_once $checkController['controllerPath'];
				$controller = $checkController['controller'];
				$controller = new $controller();

				$viewPath = __SITE_PATH . '/app/views/nginViews/error.html.php';
				$view = [
					'view'=>"$viewPath",
					'error'=> 'INVALID CONTROLLER <b>"'.ucfirst($page['page']).'"</b> </br>'
				];
				$controller->index($view);
			break;
		}
	}
}
?>