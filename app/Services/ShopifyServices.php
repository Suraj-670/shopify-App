<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class ShopifyServices
{
    private $password;
    private $store;
    private $client;

    public function __construct()
    {
        $this->password = env('SHOPIFY_ACCESS_TOKEN');
        $this->store = env('SHOPIFY_STORE');
        $this->client = new \GuzzleHttp\Client();
    }

    public function getProductRequest($url)
    {
        $response = $this->client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Shopify-Access-Token' => $this->password
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \ErrorException('Error found');
        }
        $data = [];
        $paginateLinks = $response->getHeader('Link');
        if ($paginateLinks) {

            $pageLink = $paginateLinks[0];
            $linksArr = explode(",", $pageLink);

            if ($linksArr) {

                $tobeReplace = ["<", ">", 'rel="next"', ";", 'rel="previous"'];
                $tobeReplaceWith = ["", "", "", ""];

                foreach ($linksArr as $link) {
                    $link_type  = strpos($link, 'rel="next') !== false ? "next" : "previous";
                    parse_str(parse_url(str_replace($tobeReplace, $tobeReplaceWith, $link), PHP_URL_QUERY), $op);
                    $data[$link_type] = trim($op['page_info']);
                }
            }
        }

        $productData = $response->getBody()->getContents();
        $data['allProducts'] = (json_decode($productData))->products;
        return $data;
    }

    public function fetchProductFromShopify($nextPageToken)
    {
        $param = ($nextPageToken) ? '&page_info=' . $nextPageToken : '';
        return  'https://' . $this->store . '/admin/api/2023-04/products.json?limit=250' . $param;
    }

    public function getCollection()
    {
        $response = $this->client->request('GET', 'https://' . $this->store . '/admin/api/2023-04/smart_collections.json', [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Shopify-Access-Token' => $this->password
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
