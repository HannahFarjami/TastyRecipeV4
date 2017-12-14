<?php

namespace TastyRecipe\View;

use Id1354fw\View\AbstractRequestHandler;

/**
* 
*/
class Pancake extends AbstractRequestHandler{
	

	protected function doExecute()
	{
		
		$contr = $this->session->get('Contr');
		$this->addVariable('username',$contr->getLoggedInUser());
		return "pancakes";
	}
}