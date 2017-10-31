<?php

namespace Domain\Factory;

use Domain\Entity\Post;
use Domain\PostId;

/**
 * Class PostFactory
 * @package Domain\Factory
 */
class PostFactory
{
	public function createPost(array $data): Post
	{
		$post = new Post(PostId::generate(), $data['title']);
		if (!empty($data['description'])) {
			$post->setDescription($data['description']);
		}
		$post->setCreatedAt(new \DateTime('now'));
		$post->setUpdatedAt(new \DateTime('now'));

		return $post;
	}

	public function restorePost(array $data): Post
	{
		$post = new Post(new PostId($data['id']), $data['title']);
		$post->setDescription($data['description']);
		$post->setCreatedAt(new \DateTime($data['date_add']));
		$post->setUpdatedAt(new \DateTime($data['date_mod']));

		return $post;
	}
}
