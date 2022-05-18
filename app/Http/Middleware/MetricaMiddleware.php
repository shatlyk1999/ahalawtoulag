<?php

namespace App\Http\Middleware;
use App\Metrica;
use Closure;

class MetricaMiddleware
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
        // dd('geldi');
        $currentIP = $request->ip();
        $currentURL = $request->url();
        
        $clientIp = Metrica::create([
            'ip' => $currentIP,
            'url' => $currentURL,
            'date' => now(),
        ]);
        
        
        
        return $next($request);
    }
}
