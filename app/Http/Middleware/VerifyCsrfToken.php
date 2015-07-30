<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    protected function tokensMatch($request)
    {
    	/*
    	Checks whether the request wants json response, if so, it surpresses the 
    	token verification validation
    	*/
        if ($request->wantsJson()) {
            return true;
        }
        
        return parent::tokensMatch($request);
    }
}
