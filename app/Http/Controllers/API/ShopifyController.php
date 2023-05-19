<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ShopifyController extends Controller
{
    public function getProducts(){
        $apiURL = 'https://{shop}.myshopify.com/admin/api/2023-04/products.json';
        $parameters = ['page' => 2];
              
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $apiURL, ['query' => $parameters]);
   
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);
  
    }
}
