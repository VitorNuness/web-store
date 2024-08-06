<?php

declare(strict_types=1);

namespace Core\Validation\Concerns;

use Core\Validation\Rules\FilterEmailRule;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;

trait ValidatesEmail
{
    protected function validateEmail(string $email): bool
    {
        $validator = new EmailValidator();
        $multipleValidations = new MultipleValidationWithAnd([
            new FilterEmailRule(),
            new RFCValidation(),
        ]);

        return $validator->isValid($email, $multipleValidations);
    }
}
