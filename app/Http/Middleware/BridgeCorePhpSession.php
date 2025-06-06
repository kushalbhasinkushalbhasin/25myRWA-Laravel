<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class BridgeCorePhpSession
{
    public function handle(Request $request, Closure $next)
    {
        // Start native PHP session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // If user_id exists in the PHP session, retrieve the user
        if (isset($_SESSION['user_id'])) {
            $user = User::find($_SESSION['user_id']);

            // Share user globally with all views (similar to Auth::user())
            if ($user) {
                // You can access this in views via $loggedInUser
                view()->share('loggedInUser', $user);
                
                // Or optionally attach it to the request
                $request->attributes->set('loggedInUser', $user);
            }
        }

        return $next($request);
    }
}
