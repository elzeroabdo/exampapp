<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Teacher;

final class DeleteTeacher
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // get user
        $user=auth()->user();
        // chack if user is authenticated
        if(!$user){
            throw new \Error('Unauthenticated');
        }
        // delete teacher if user is authenticated
        $teacher=Teacher::where('user_id',$user->id)->first();
        if($teacher->user_id==$user->id){
            $teacher->delete();
            return ['message' => 'teacher deleted'];
        }else{
            throw new \Error('do not have permission');
        }
    }
}
