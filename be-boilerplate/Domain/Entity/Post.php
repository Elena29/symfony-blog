<?php

namespace Domain\Entity;

use Domain\PostId;

/**
 * Class Post
 * @package Domain\Entity
 */
class Post
{
	/**
	 * @var PostId
	 */
	private $id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var \DateTime
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 */
	private $updatedAt;

	/**
	 * Post constructor.
	 * @param PostId $id
	 * @param string $title
	 */
	public function __construct(PostId $id, $title)
	{
		$this->id = $id;
		$this->title = $title;
	}

	/**
	 * @return PostId
	 */
	public function getId(): PostId
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreatedAt(): \DateTime
	{
		return $this->createdAt;
	}

	/**
	 * @param string $description
	 */
	public function setDescription(string $description)
	{
		$this->description = $description;
	}

	/**
	 * @param \DateTime $createdAt
	 */
	public function setCreatedAt(\DateTime $createdAt)
	{
		$this->createdAt = $createdAt;
	}

	/**
	 * @return \DateTime
	 */
	public function getUpdatedAt(): \DateTime
	{
		return $this->updatedAt;
	}

	/**
	 * @param \DateTime $updatedAt
	 */
	public function setUpdatedAt(\DateTime $updatedAt = null)
	{
		$this->updatedAt = $updatedAt ?? new \DateTime('now');
	}
}
