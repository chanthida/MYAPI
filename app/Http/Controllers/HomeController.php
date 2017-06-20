<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

// GET USER TOKEN
        $user_token = Auth::user()->token;

// GET ALL ACCOUNTS  
        $account_url = 'http://api2-client.myhemisphere.com/accounts.xml';
        $client = new Client;
        $results = $client->request('GET', $account_url, [
            'query' => [
                'sessionKey' => $user_token
            ]
        ]);
        $xml = simplexml_load_string($results->getBody(),'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);        
        $accounts = json_decode($json, true);
        //dd($accounts);

// GET ALL ITEMS
        $item_url = 'http://api2-client.myhemisphere.com/items.xml';
        $client = new Client;
        $results = $client->request('GET', $item_url, [
            'query' => [
                'sessionKey' => $user_token
            ]
        ]);
        $xml = simplexml_load_string($results->getBody(),'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);        
        $items = json_decode($json, true);
        //dd($items);

// GET ITEM ACCOUNT
        
        $item_url = 'http://api2-client.myhemisphere.com/items/account.xml';
        $client = new Client;
        $results = $client->request('GET', $item_url, [
            'query' => [
                'id' => 1,
                'sessionKey' => $user_token
            ]
        ]);
        $xml = simplexml_load_string($results->getBody(),'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);        
        $itemAccount = json_decode($json, true);
        //dd($itemAccount);
        

// GET ALL ORDERS        
        $order_url = 'http://api2-client.myhemisphere.com/orders.xml';
        $client = new Client;
        $results = $client->request('GET', $order_url, [
            'query' => [
                'sessionKey' => $user_token
            ]
        ]);
        $xml = simplexml_load_string($results->getBody(),'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);        
        $orders = json_decode($json, true);
        //dd($orders);
        
// GET ORDER ITEM
        $order_url = 'http://api2-client.myhemisphere.com/orders/item.xml';
        $client = new Client;
        $results = $client->request('GET', $order_url, [
            'query' => [
                'id' => 1,
                'sessionKey' => $user_token
            ]
        ]);
        $xml = simplexml_load_string($results->getBody(),'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);        
        $orderItem = json_decode($json, true);
        //dd($orderItem);

        return view('home', compact('accounts', 'items', 'itemAccount', 'orders', 'orderItem'));
        
    }

}
