<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Entities\CartEntity;
use App\Models\Entities\ProductEntity;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'products' => ProductEntity::paginate(20, ['*'], 'productsPage'),
            'cart' => CartEntity::where('user_id', Auth::user()->id)
                ->orderBy('created_at')
                ->paginate(20, ['*'], 'cartPage'),
            'rates' => $this->getRatesByLaravel(),
        ]);
    }

    private function getRatesByLaravel(): array
    {
        $data = Http::get(config('app.fast_forex_url'), [
            'from' => 'USD',
            'to' => 'EUR,GBP,UAH',
            'api_key' => config('app.fast_forex_key'),
        ]);

        return json_decode($data, true);
    }

    private function getRatesByGuzzle(): array
    {
        $client = new Client();
        $response = $client->request(
            'GET',
            config('app.fast_forex_url'),
            [
                'query' => [
                    'from' => 'USD',
                    'to' => 'EUR,GBP,UAH',
                    'api_key' => config('app.fast_forex_key'),
                ],
            ]
        );

        $data = '';
        while (!$response->getBody()->eof()) {
            $data .= $response->getBody()->read(1024);
        }

        return json_decode($data, true);
    }
}
