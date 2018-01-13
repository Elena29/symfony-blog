<?php

namespace Infrastructure\Sql;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Domain\Entity\Post;
use Domain\Factory\PostFactory;
use Domain\PostRepositoryInterface;
use Domain\PostId;

/**
 * Class PostRepository
 * @package Infrastructure\Sql
 */
class PostRepository implements PostRepositoryInterface
{
	const INVALID_DATA = 100;
	private $em;
	private $postFactory;

	public function __construct(EntityManagerInterface $em, PostFactory $postFactory)
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
		$query = 'SELECT * FROM post ORDER BY date_add DESC, date_mod DESC';
		$statement = $this->em->getConnection()->prepare($query);
		$statement->execute();
		$data = $statement->fetchAll();
		$list = new ArrayCollection();
		foreach ($data as $row) {
			$list->add($this->postFactory->restorePost($row));
		}

		return $list;
	}

	public function create(Post $post): Post
	{
		$query = 'INSERT INTO post(title, description, date_add, date_mod) '
			. 'VALUES (:title, :description, :created, :modified)';
		$statement = $this->em->getConnection()->prepare($query);
		$data = [
			'title'       => $post->getTitle(),
			'description' => $post->getDescription(),
			'created'     => $post->getCreatedAt()->format('Y-m-d H:i:s'),
			'modified'    => $post->getUpdatedAt()->format('Y-m-d H:i:s')
		];
		$statement->execute($data);
		$lastInsertedId = $this->em->getConnection()->lastInsertId();
		if (!$lastInsertedId) {
			throw new \DomainException('Post cannot be created', self::INVALID_DATA);
		}
		$data['id'] = $lastInsertedId;
		return $this->postFactory->restorePost($data);
	}

	public function update(Post $post): Post
	{
		// TODO: Implement update() method.
	}
}
