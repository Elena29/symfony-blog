<?php

namespace App\Validators;

/**
 * Class PostValidator
 * @package App\Validators
 */
class PostValidator implements ValidatorInterface
{
	const INVALID_PARAMETERS = 101;

	/**
	 * @var array
	 */
	private $errors;

	/**
	 * TODO: Implement validation
	 *
	 * @param array $data
	 *
	 * @return bool
	 */
	public function isValid(array $data): bool
	{
		return true;
	}

	public function getErrors(): array
	{
		return $this->errors;
	}
}
