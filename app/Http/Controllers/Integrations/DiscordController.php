<?php

namespace App\Http\Controllers\Integrations;

use App\Integrations\Discord;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscordController extends Controller
{
    /**
     * Handles returning request from Discord OAuth.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        /**
         * If request is malformed, redirect user back to DC OAuth.
         */
        if (!$request->has('code'))
            return redirect()
                ->to(Discord::get()->getAuthorizationUrl(['scope' => 'identify', 'guild']));

        /**
         * Get DC OAuth access token and resource owner object.
         */
        try
        {
            $token = Discord::get()->getAccessToken(
                'authorization_code',
                ['code' => $request->get('code')],
            );
        }
        catch (Exception $o_o)
        {
            return redirect()
                ->route('welcome')
                ->with('danger', 'Autorizace se nezdařila. Zkuste to prosím znovu.');
        }

        $owner = Discord::get()->getResourceOwner($token);
        
        /**
         * Find/create user by discord_id.
         */
        $user = User::firstOrCreate([
            'discord_id' => $owner->getId(),
        ], [
            'name' => $owner->getUsername(),
        ]);
        
        /**
         * Log in the matching user.
         */
        Auth::login($user);

        return redirect()
            ->route('home');
    }
}
