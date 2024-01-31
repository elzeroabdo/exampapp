<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

final class Logout
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (auth()->check()) {
            auth()->logout();
        }

        return ['message' => 'Successfully logged out.'];
    }
}
