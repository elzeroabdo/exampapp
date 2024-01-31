<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Teacher;

final class UpdateTeacher
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

        // update teacher if user is authenticated
        $teacher=Teacher::where('user_id',$user->id)->first();
        if($teacher->user_id==$user->id){
            $teacher->name=$args['input']['name'];
            $teacher->email=$args['input']['email'];
            $teacher->phone=$args['input']['phone'];
            $teacher->save();
            return $teacher;
        }else{
            throw new \Error('do not have permission');
        }



    }
}
