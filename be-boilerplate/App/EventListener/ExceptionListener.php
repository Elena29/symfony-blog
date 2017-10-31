<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

/**
 * Class ExceptionListener
 * @package App\EventListener
 */
class ExceptionListener
{
	public function onKernelException(GetResponseForExceptionEvent $event)
	{
		$exception = $event->getException();
		$response = new Response();
		$response->setContent(
			json_encode(
				[
					'code'  => $exception->getCode(),
					'title' => $exception->getMessage()
				]
			)
		);

		if ($exception instanceof \DomainException) {
			$response->setStatusCode(Response::HTTP_BAD_REQUEST);
		} elseif ($exception instanceof \InvalidArgumentException) {
			$response->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
		} else {
			$response->setStatusCode(Response::HTTP_NOT_FOUND);
		}

		$event->setResponse($response);
	}
}
