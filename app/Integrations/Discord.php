<?php

namespace App\Integrations;

use GuzzleHttp\Client;
use Wohali\OAuth2\Client\Provider\Discord as DiscordProvider;

class Discord
{
    private static $instance;

    /**
     * Returns new instance of the provider.
     *
     * @return Wohali\OAuth2\Client\Provider\Discord
     */
    public static function get()
    {
        if (!self::$instance)
            self::$instance = new DiscordProvider([
                'clientId' => config('oauth.discord.id'),
                'clientSecret' => config('oauth.discord.secret'),
                'redirectUri' => route('discord.authorize'),
            ]);

        return self::$instance;
    }
}
