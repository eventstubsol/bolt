<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use App\Event;

use Closure;

class isTeacher
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
        $user = Auth::user();
        if(!$user){
            abort(403);
        }
        if($request->route('id')){
           $event_user = Event::find($request->route('id')) ? Event::find($request->route('id'))->user_id :'';
           if($event_user===''){
               return $next($request);
           }
           if($event_user===$user->id){
               return $next($request);
           }else{
            abort(403);
           }
        }
        if($request->route('event_id')){
           $event_user = Event::find($request->route('event_id')) ? Event::find($request->route('event_id'))->user_id :'';
           if($event_user===''){
            return $next($request);
        }
           if($event_user===$user->id){
               return $next($request);
           }else{
            abort(403);
           }
        }
        // dd($request->route('id'));
        if(Auth::check() && ($user->type == 'eventee' || $user->type == 'admin')){
            return $next($request);
        }
        
        return redirect('/');
        // abort(404);
    }
}
