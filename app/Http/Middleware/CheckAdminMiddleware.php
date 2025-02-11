<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //find user by id
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        //get previous url (the url where user came from)
        $previousUrl = back()->getTargetUrl();
        //store the url in a session
        session(['previousUrl'=>$previousUrl]);
        
        //check if user has admin role
        if($user->role==='admin')
           return $next($request);
        return redirect('/error?status=403');
    }
}
