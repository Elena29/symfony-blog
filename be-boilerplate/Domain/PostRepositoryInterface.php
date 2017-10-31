<?php

namespace Domain;

use Domain\Entity\Post;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface PostRepositoryInterface
 * @package Domain
 */
interface PostRepositoryInterface
{
	public function getById(PostId $postId);

	public function getAll(): ArrayCollection;

	public function create(Post $post): Post;

	public function update(Post $post): Post;
}
