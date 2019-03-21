<?php

namespace Binalogue\SpotifyAuthTool\Http\Middleware;

use Binalogue\SpotifyAuthTool\SpotifyAuthTool;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(SpotifyAuthTool::class)->authorize($request) ? $next($request) : abort(403);
    }
}
