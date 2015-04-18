<?php
class IndexController implements IController
{
	
	function indexAction()
	{
		$fc = FrontController::getInstance();
		$view = new View();
		$params = $fc->getParams();
		$view->name = $params['name'];
		$result = $view->render('../views/index.php');
		$fc->setBody($result);
	}
}
?>