<?php

namespace Domain;

use Ramsey\Uuid\Uuid;

/**
 * Class PostId
 * @package Domain
 */
final class PostId
{
    /**
     * @var int
     */
    private $id;

    /**
     * PostId constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return (int) $this->__toString();
    }

    /**
     * @return PostId
     */
    public static function generate()
    {
        return new self(Uuid::uuid4());
    }
}