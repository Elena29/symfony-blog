<?php

namespace Domain;

use Domain\Entity\Post;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface IPostRepository
 * @package Domain
 */
interface IPostRepository
{
	public function getById(PostId $postId);

	public function getAll(): ArrayCollection;

	public function create(Post $post): Post;

	public function update(Post $post): Post;
}
