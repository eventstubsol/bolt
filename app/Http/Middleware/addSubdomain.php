<?php

namespace App\Http\Middleware;

use App\Event;
use Illuminate\Support\Facades\Auth;


use Closure;

class addSubdomain
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
        // dd($request->subdomain);
        // if($request->subdomain){
        //     return $next($request);
        // }
        
        $currDomain = \Request::getHost();
        $event = Event::where('domain',$currDomain)->first();
        // dd($event);
        if($event){
            $request->route()->setParameter('subdomain',$event->slug);
            return $next($request);
        }else{
            return "Event Not Found";
        }
        // array_push($request->parameters,['subdomain'=>"shubh"]);
        // dd($request);
    }
}
