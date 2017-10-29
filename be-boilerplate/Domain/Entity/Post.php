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
	private $date;

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
	public function getDate(): \DateTime
	{
		return $this->date;
	}

	/**
	 * @param string $description
	 */
	public function setDescription(string $description)
	{
		$this->description = $description;
	}

	/**
	 * @param \DateTime $date
	 */
	public function setDate(\DateTime $date)
	{
		$this->date = $date;
	}
}
