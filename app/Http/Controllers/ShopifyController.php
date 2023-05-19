<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use App\Services\ShopifyServices;
use Exception;

class ShopifyController extends Controller
{
    private $ShopifyServices;

    public function __construct(ShopifyServices $ShopifyServices)
    {
        $this->ShopifyServices = $ShopifyServices;
    }

    public function syncCollections()
    {
        $collections = $this->ShopifyServices->getCollection();
        try {
            if ($collections && $collections['smart_collections']) {
                foreach ($collections['smart_collections'] as $collection) {
                    $newCollection = Collection::updateOrCreate(
                        ['title' =>  $collection['title']],
                        ['handle' => $collection['handle']]
                    );
                    $newCollection->save();
                }
            }
            return view('pages.success')->with('message', 'Shopify collection sync to database successfully!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function syncProducts()
    {
        $count = 0;
        try {
            $nextPageToken = null;
            do {
                $url = $this->ShopifyServices->fetchProductFromShopify($nextPageToken);
                $data = $this->ShopifyServices->getProductRequest($url);
                $fetchedProducts = $data['allProducts'];
                $nextPageToken = isset($data['next']) ? $data['next'] : null;
                if ($fetchedProducts) {
                    $count += count((array) $fetchedProducts);
                    $this->storeProducts($fetchedProducts);
                }
            } while ($nextPageToken);
            return view('pages.success')->with('message', 'Shopify product sync to database successfully!');
        } catch (Exception  $e) {
            throw new \ErrorException('Error found');
        }
    }

    public function storeProducts($products)
    {
        $image = null;
        foreach ($products as $product) {
            if ($product->images && $product->images[0] && $product->images[0]->src) {
                $image = $product->images[0]->src;
            }
            Product::insert(
                [
                    'title' =>  $product->title,
                    'body_html' => $product->body_html,
                    'vendor' => $product->vendor,
                    'product_type' => $product->product_type,
                    'handle' => $product->handle,
                    'published_at' => $product->published_at,
                    'image' => $image
                ]
            );
        }
    }
}
