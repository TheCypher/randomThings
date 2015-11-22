<?php
class ErrorController extends BaseController
{
	public function index($view)
	{
		/*-- load view  --*/
		include $view['view'];
	}
}
?>