<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends FOSRestController
{

	/**
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getPostsAction(Request $request)
	{
		$data = array("hello" => "world");
		$view = $this->view($data);
		return $this->handleView($view);
	}
}
