<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Subject;

final class DeleteSubject
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $subject = Subject::find($args['id']);
        if (!$subject) {
            return ['message' => 'Subject not found'];
        }
        $subject->delete();

        return ['message' => 'Subject deleted successfully'];
    }
}
