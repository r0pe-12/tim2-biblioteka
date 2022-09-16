<?php

namespace App\Http\Middleware;

use App\Models\ApiToken;
use App\Models\Token;
use Closure;
use Illuminate\Http\Request;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $bearerToken = $this->getBearerTokenFromRequest($request);
        $validated = $this->checkValidToken($bearerToken);
        if( $bearerToken === false || $validated === false ) {
            return response()->json(['error' => 'Not authorized.'],403);
        }
        return $next($request);
    }

    private function getBearerTokenFromRequest($request) {
        $authStr = $request->header("authorization");
        if( $this->startsWith($authStr, 'Bearer ')) {
            $tokenStartIndex = 7;
            return substr($authStr, $tokenStartIndex);
        }
        return false;
    }

    function startsWith ($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    private function checkValidToken($token) {
        if(empty($token)){
            return false;
        }
        $t = ApiToken::mobileToken()->token;
        if( $t != $token) {
            return false;
        }
        return true;
    }

}
