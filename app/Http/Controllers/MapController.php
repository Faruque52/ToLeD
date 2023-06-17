<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showMap()
    {
        return view('map');
    }

    public function getLocation(Request $request)
    {
        $address = $request->input('address');
        $apiKey = 'AIzaSyDsFCHiUGGJBD7yAZR1kWH8tXOTFN0nflM'; // Replace with your actual API key

        $client = new Client();

        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => [
                'address' => $address,
                'key' => $apiKey,
            ],
        ]);

        $result = json_decode($response->getBody(), true);

        if ($result['status'] === 'OK') {
            $latitude = $result['results'][0]['geometry']['location']['lat'];
            $longitude = $result['results'][0]['geometry']['location']['lng'];

            return response()->json(['latitude' => $latitude, 'longitude' => $longitude]);
        } else {
            return response()->json(['error' => 'Unable to retrieve location']);
        }
    }
}
