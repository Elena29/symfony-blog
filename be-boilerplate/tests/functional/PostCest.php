<?php

use \FunctionalTester as FunctionalTester;

class PostCest
{
	public function test_get_post (FunctionalTester $I)
	{
		$I->wantTo('Show post details.');
		$I->haveHttpHeader('Content-Type', 'application/json');
		$I->sendGET('/posts/1');
		$I->seeResponseIsJson();
//		$I->canSeeResponseContainsJson();
//		$postId = $I->grabDataFromResponseByJsonPath('post.id');
//		$I->seeInDatabase('post', ['id' => $postId]);
	}
}