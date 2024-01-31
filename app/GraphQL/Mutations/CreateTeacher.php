<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Teacher;

final class CreateTeacher
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user=auth()->user();

        // chack if user is authenticated
        if(!$user){
            throw new \Error('Unauthenticated');
        }

        // create teacher if user is authenticated for put user id in teacher
        $teacher=new Teacher();
        $teacher->user_id=$user->id;
        $teacher->name=$args['input']['name'];
        $teacher->email=$args['input']['email'];
        $teacher->phone=$args['input']['phone'];
        $teacher->save();
        return $teacher;

    }
}
