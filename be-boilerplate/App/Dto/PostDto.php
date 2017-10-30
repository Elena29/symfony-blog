<?php

namespace App\Dto;

use Domain\Entity\Post;

/**
 * Class PostDto
 * @package App\Dto
 */
class PostDto
{
	public $id;
	public $title;
	public $description;
	public $created;
	public $modified;

	/**
	 * PostDto constructor.
	 *
	 * @param Post $post
	 */
	public function __construct(Post $post)
	{
		$this->id = (string)$post->getId();
		$this->title = $post->getTitle();
		$this->description = $post->getDescription();
		$this->created = $post->getCreatedAt()->format('Y-m-d H:i:s');
		$this->modified = $post->getUpdatedAt()->format('Y-m-d H:i:s');
	}

	/**
	 * @return array
	 */
	public function __toArray()
	{
		return [
			'id'          => $this->id,
			'title'       => $this->title,
			'description' => $this->description,
			'created'     => $this->created,
			'modified'    => $this->modified
		];
	}
}
