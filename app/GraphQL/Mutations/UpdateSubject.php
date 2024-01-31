<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Subject;

final class UpdateSubject
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $subject=Subject::find($args['input']['id']);
        $subject->update([
            'name' => $args['input']['name'],
            'description' => $args['input']['description'],
            'teacher_id' => $args['input']['teacher_id'],
        ]);

        return $subject;
    }
}
