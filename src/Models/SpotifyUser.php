<?php

namespace Mgoigfer\SpotifyAuthResourceTool\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SpotifyUser extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Model Properties
    |--------------------------------------------------------------------------
    */

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'spotify_id' => $this->spotify_id,
            'name' => $this->name,
            'email' => $this->email,
            'alias' => $this->alias,
            'avatar' => $this->avatar,
            'location' => $this->location,
            'refresh_token' => $this->refresh_token,
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string The route key
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /*
    |--------------------------------------------------------------------------
    | Model Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Get the avatar attribute for the model.
     *
     * @return string
     */
    public function getAvatarAttribute($image)
    {
        if (!$image || starts_with($image, 'http')) {
            return $image;
        }

        return Storage::disk('public')->url($image);
    }
}
