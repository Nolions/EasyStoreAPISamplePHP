<?php

namespace App\Http\Controllers;

use EasyStore\Client;
use EasyStore\Options;
use Illuminate\Http\JsonResponse;

class EasyStoreController extends Controller
{
    private $client;

    public function __construct($options = [], $httpClient = null)
    {
        $this->client = new Client(['shop' => env('EASY_STORE_SHOP_NAME', "")]);
    }

    public function oAuth()
    {
        $shopName = env('EASY_STORE_SHOP_NAME', "");
        $clientId = env('EASY_STORE_CLIENT_ID', "");
        $scopes = env('EASY_STORE_SCOPES', "");
        $redirectUrl = env('EASY_STORE_REDIRECT_URL', "http://localhost");

        Options::setOptions([
            'shop' => $shopName,
            'client_id' => $clientId,
            'scopes' => $scopes,
            'redirect_uri' => $redirectUrl,
        ]);

        $requestUrl = $this->client->buildAuthUrl();

        redirect($requestUrl);
    }

    public function accessToken(): JsonResponse
    {
        $shopName = env('EASY_STORE_SHOP_NAME', "");
        $clientId = env('EASY_STORE_CLIENT_ID', "");
        $secret = env('EASY_STORE_SECRET', "");

        Options::setOptions([
            'shop' => $shopName,
            'client_id' => $clientId,
            'client_secret' => $secret,
        ]);

        $accessToken = $this->client->getAccessToken();

        return response()->json(['token' => $accessToken]);
    }
}
