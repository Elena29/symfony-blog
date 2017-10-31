<?php

namespace App\Controller;

use App\Dto\PostDto;
use App\Dto\PostsDto;
use App\Services\PostService;
use Domain\PostId;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
		$posts = $this->postService->findAllPosts();
		$view = $this->view((new PostsDto($posts))->__toArray());
		return $this->handleView($view);
	}

	public function getPostAction(int $postId): Response
	{
		$post = $this->postService->findPostBy(new PostId($postId));
		$view = $this->view((new PostDto($post))->__toArray());
		return $this->handleView($view);
	}

	public function postPostAction(Request $request): Response
	{
		if (empty($request->getContent())) {
			throw new HttpException(Response::HTTP_NOT_FOUND, 'Missing submitted data');
		}

		$data = json_decode($request->getContent(), true);
		$post = $this->postService->savePost($data);
		$view = $this->view((new PostDto($post))->__toArray());
		$view->setStatusCode(Response::HTTP_CREATED);
		return $this->handleView($view);
	}
}
