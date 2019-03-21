<template>
  <div>
    <heading class="mb-6">
      Spotify Auth
    </heading>

    <div class="flex">
      <span class="mb-6">
        <button
          class="btn btn-default btn-primary"
          @click="createSpotifyUser"
        >
          Create a new Spotify User
        </button>
      </span>
    </div>
  </div>
</template>

<script>
/* global Nova, OAuth */

/* Vendor */
import 'oauthio-web';

export default {
  methods: {
    async createSpotifyUser() {
      OAuth.initialize('QvfBNkh58RHKx3RRK6ogKMaWBvE');

      const result = await OAuth.popup('spotify', {
        authorize: {
          show_dialog: true,
        },
      });
      const me = await result.me();

      Nova.request().post('/nova-vendor/nova-spotify-auth-tool/spotify-users', {
        spotify_id: me.id,
        name: me.name,
        email: me.email,
        alias: me.alias,
        avatar: me.avatar.url || '',
        location: me.location,
        refresh_token: result.refresh_token,
      });
    },
  },
};
</script>
