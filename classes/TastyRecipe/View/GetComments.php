<?php

namespace TastyRecipe\View;

use Id1354fw\View\AbstractRequestHandler;

/**
* 
*/
class GetComments extends AbstractRequestHandler
{
	private $url;

	public function setUrl($url){
		$this->url = $url;
	}	
	
	protected function doExecute()
	{
		$contr = $this->session->get('Contr');
		$result = $contr->viewComments($this->url);
		print_r($url);
		echo json_encode($result);
	}
}