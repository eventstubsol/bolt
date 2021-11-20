<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use App\User;
class SessionCheck
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
        if(Auth::check()){
            if ((time() - Session::activity()) > (Config::get('session.lifetime') * 60))
            {
                if(Auth::user()->type == 'eventee'){
                    $user = User::findOrFail(Auth::id());
                    $user->online_status = 0;
                    $user->save();
                    return redirect(route('Eventee.login'));
                }
                else{
                    $user = User::findOrFail(Auth::id());
                    $user->online_status = 0;
                    $user->save();
                    return redirect('/');
                }
            }
        }
        return $next($request);
    }
}
