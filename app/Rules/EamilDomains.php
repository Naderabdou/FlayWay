<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EamilDomains implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // List of allowed domains
        $allowedDomains = ['gmail.com', 'hotmail.com', 'yahoo.com', 'outlook.com', 'flayway.com','flyway.sa'];

        // Extract the domain from the email address
        $domain = substr(strrchr($value, "@"), 1);

        // Check if the domain is in the allowed list
        if (!in_array($domain, $allowedDomains)) {
            $fail(trans('email_domain', ['domains' => implode(', ', $allowedDomains)]));        }
    }
}
