<?php

namespace Binalogue\SpotifyAuthTool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Binalogue\SpotifyAuthTool\Models\SpotifyUser;

class SpotifyUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    */

    /**
     * Get a Spotify user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(SpotifyUser $user)
    {
        return response()->json($user);
    }

    /**
     * Store a Spotify user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = new SpotifyUser();
        $user->spotify_id = $request->spotify_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alias = $request->alias;
        $user->avatar = $request->avatar;
        $user->location = $request->location;
        $user->refresh_token = $request->refresh_token;
        $user->save();

        return response()->json($user);
    }
}
