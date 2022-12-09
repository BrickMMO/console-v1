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

        $data = $response->content();

        if(Str::isJson($data))
        {
            return $response;
        }

        $data = json_decode($data, true);
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
            elseif (Str::isJson($value)) // (is_string($value) and json_decode($value))
            {
                $data[$key] = json_decode($value, true);
            }
        }

        return $data;

    }
}
