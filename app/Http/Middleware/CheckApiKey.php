<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Brain;


class CheckApiKey
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

        if (!$request->get('key'))
        {
            return response()->json(['status' => 'Unauthorized', 'error' => 'No key provided'], 401);
        }
        
        $brain = Brain::where('key', $request->get('key'))->first();

        if (!$brain)
        {
            return response()->json(['status' => 'Unauthorized', 'error' => 'Key not found: '.$request->get('key')], 401);
        }

        $request->merge(['brain' => $brain]);
        
        return $next($request);
        
    }
}
