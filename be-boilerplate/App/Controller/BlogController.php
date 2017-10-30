<?php

namespace App\Controller;

use App\Dto\PostDto;
use App\Services\PostService;
use Domain\PostId;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends FOSRestController
{
	private $postService;

	public function __construct(PostService $postService)
	{
		$this->postService = $postService;
	}

	public function getPostsAction(): Response
	{
		$data = ["hello" => "world"];
		$view = $this->view($data);
		return $this->handleView($view);
	}

	public function getPostAction(int $postId): Response
	{
		$post = $this->postService->findPostBy(new PostId($postId));
		$data = new PostDto($post);
		$view = $this->view($data->__toArray());
		return $this->handleView($view);
	}
}
