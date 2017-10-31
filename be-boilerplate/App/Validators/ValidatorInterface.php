<?php

namespace App\Validators;

/**
 * Interface ValidatorInterface
 * @package App\Validators
 */
interface ValidatorInterface
{
	public function isValid(array $data): bool;

	public function getErrors(): array;
}
