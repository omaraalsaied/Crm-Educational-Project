<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Ramsey\Uuid\Nonstandard\Uuid;


class RequestId
{
    public function handle(Request $request, Closure $next) : mixed
    {
//        $uuid = $request->headers->get('X-Request-ID');
//        if(is_null($uuid)){
//            $uuid = Uuid::uuid4()->toString();
//            $request->headers->set('X-Request-ID',$uuid);
//        }
//        $response = $next($request);
//        $response->headers->get('X-Request-ID',$uuid);
//    return $response;

        $response = $next($request);
        $uuid = Uuid::uuid4()->toString();
        $request->headers->set('X-Request-Id', $uuid);
        $response->header('X-Request-Id', $uuid);
        return $response;
    }
}
