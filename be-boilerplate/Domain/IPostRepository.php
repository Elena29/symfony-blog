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
	/**
	 * @return Post
	 */
	public function getById();

	/**
	 * @return ArrayCollection
	 */
	public function getAll();
}
