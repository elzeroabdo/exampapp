<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

final class Expiremunt
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $token= JWTAuth::getToken();

        if(!$token){
            throw new \Error ('Invalid token');
        }

        // GET THE EXPIRATION TIME IN SECONDS
        $expire = JWTAuth::getPayload($token)->get('exp');

        //CALCULATE THE EXPIRATION TIME RELATIVE TO NOW
        $now = now()->timestamp;
        $reamaining = max(0,ceil(($expire - $now)/60));

        return $reamaining;
    }
}
