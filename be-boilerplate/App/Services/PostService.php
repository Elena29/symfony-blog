<?php

namespace App\Services;

use Doctrine\Common\Collections\ArrayCollection;
use Domain\Entity\Post;
use Domain\IPostRepository;
use Domain\PostId;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{
	private $postRepository;

	public function __construct(IPostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	public function findAllPosts(): ArrayCollection
	{
		return $this->postRepository->getAll();
	}

	public function findPostBy(PostId $postId): Post
	{
		return $this->postRepository->getById($postId);
	}
}
