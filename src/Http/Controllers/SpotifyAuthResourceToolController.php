<?php

namespace Mgoigfer\SpotifyAuthResourceTool\Http\Controllers;

use Illuminate\Routing\Controller;
use Mgoigfer\SpotifyAuthResourceTool\Models\SpotifyUser;

class SpotifyAuthResourceToolController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Web
    |--------------------------------------------------------------------------
    */

    /**
     * Spotify authentication.
     *
     * @return mixed
     */
    public function auth()
    {
        $spotify = app()
            ->make('SpotifyWrapper', [
                'callback' => '/nova-vendor/nova-spotify-auth-resource-tool/auth',
                'scope' => [],
                'show_dialog' => true,
            ])
            ->requestAccessToken();

        $spotify->api->setAccessToken($spotify->session->getAccessToken());

        Spotify::updateOrCreate(
            ['key' => 'user_id'],
            ['value' => $spotify->api->me()->id]
        );

        Spotify::updateOrCreate(
            ['key' => 'refresh_token'],
            ['value' => $spotify->session->getRefreshToken()]
        );

        return redirect('nova/nova-spotify-auth-resource-tool');
    }
}
