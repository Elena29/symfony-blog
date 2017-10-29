<?php

namespace Unit;

use Domain\Entity\Post;
use Domain\PostId;
use PHPUnit\Framework\TestCase;

/**
 * Class PostTest
 * @package Unit
 */
class PostTest extends TestCase
{
    public function test_create_post_object()
    {
        $post = new Post(new PostId(1), 'test');
        $this->assertEquals(1, (string)$post->getId());
        $this->assertEquals('test', $post->getTitle());
    }
}