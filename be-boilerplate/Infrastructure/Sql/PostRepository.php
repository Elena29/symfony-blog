<?php

namespace Infrastructure\Sql;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Domain\Entity\Post;
use Domain\Factory\PostFactory;
use Domain\IPostRepository;
use Domain\PostId;

/**
 * Class PostRepository
 * @package Infrastructure\Sql
 */
class PostRepository implements IPostRepository
{
	const INVALID_DATA = 100;
	private $em;
	private $postFactory;

	public function __construct(EntityManager $em, PostFactory $postFactory)
	{
		$this->em = $em;
		$this->postFactory = $postFactory;
	}

	public function getById(PostId $postId): Post
	{
		$query = 'SELECT * FROM post WHERE post.id = :id';
		$statement = $this->em->getConnection()->prepare($query);
		$statement->execute(['id' => (string)$postId]);
		$data = $statement->fetch();
		if (!$data) {
			throw new \DomainException('Post with id:' . (string)$postId . ' cannot be found', self::INVALID_DATA);
		}

		return $this->postFactory->restorePost($data);
	}

	public function getAll(): ArrayCollection
	{
		// TODO: Implement getAll() method.
	}

	public function create(Post $post): Post
	{
		// TODO: Implement create() method.
	}

	public function update(Post $post): Post
	{
		// TODO: Implement update() method.
	}
}
