<?php

namespace Infrastructure\Sql;

use Doctrine\Common\Collections\ArrayCollection;
use Domain\Entity\Post;
use Domain\IPostRepository;

/**
 * Class PostRepository
 * @package Infrastructure\Sql
 */
class PostRepository implements IPostRepository
{
	/**
	 * @return Post
	 */
	public function getById()
	{
		// TODO: Implement getById() method.
	}

	/**
	 * @return  ArrayCollection
	 */
	public function getAll()
	{
		// TODO: Implement getAll() method.
	}
}
