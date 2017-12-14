<?php

namespace TastyRecipe\View;

use Id1354fw\View\AbstractRequestHandler;

/**
* 
*/
class GetUser extends AbstractRequestHandler
{
	
	protected function doExecute()
	{
		$contr = $this->session->get('Contr');
		echo json_encode($contr->getLoggedInUser());
	}
}