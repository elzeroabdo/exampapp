<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Subject;

final class CreateSubject
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $subject=Subject::create([
            'name' => $args['input']['name'],
            'description' => $args['input']['description'],
            'teacher_id' => $args['input']['teacher_id'],
        ]);

        return $subject;
    }
}
