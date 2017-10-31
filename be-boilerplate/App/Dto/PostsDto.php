<?php

namespace App\Dto;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PostsDto
 * @package App\Dto
 */
class PostsDto
{
	public $posts;

	public function __construct(ArrayCollection $posts)
	{
		$this->posts = $posts;
	}

	public function __toArray(): array
	{
		$data = [];
		foreach ($this->posts as $post) {
			$data[] = (new PostDto($post))->__toArray();
		}

		return ['posts' => $data];
	}
}
