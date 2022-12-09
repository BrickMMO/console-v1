<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class CheckForJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $response = $next($request);

        $data = json_decode($response->content(), true);

        if(!is_array($data))
        {
            return $response;
        }

        $data = $this->checkForJson($data);

        return response()->json($data);
    }

    private function checkForJson($data)
    {

        foreach($data as $key => $value)
        {
            if (is_array($value))
            {
                $data[$key] = $this->checkForJson($value);
            }
            elseif (is_string($value) and json_decode($value))
            {
                $data[$key] = json_decode($value, true);
            }
        }

        return $data;

    }
}