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

	public function createPost()
	{
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
