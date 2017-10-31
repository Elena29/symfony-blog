<?php

namespace App\Services;

use App\Validators\PostValidator;
use Doctrine\Common\Collections\ArrayCollection;
use Domain\Entity\Post;
use Domain\Factory\PostFactory;
use Domain\PostRepositoryInterface;
use Domain\PostId;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{
	private $postRepository;
	private $postFactory;
	private $postValidator;

	public function __construct(
		PostRepositoryInterface $postRepository,
		PostFactory $postFactory,
		PostValidator $postValidator
	) {
		$this->postRepository = $postRepository;
		$this->postFactory = $postFactory;
		$this->postValidator = $postValidator;
	}

	public function findAllPosts(): ArrayCollection
	{
		return $this->postRepository->getAll();
	}

	public function findPostBy(PostId $postId): Post
	{
		return $this->postRepository->getById($postId);
	}

	public function savePost(array $data): Post
	{
		if (!$this->postValidator->isValid($data)) {
			$errors = $this->postValidator->getErrors();
			throw new \InvalidArgumentException(current($errors), PostValidator::INVALID_PARAMETERS);
		}
		return $this->postRepository->create(
			$this->postFactory->createPost($data)
		);
	}
}
