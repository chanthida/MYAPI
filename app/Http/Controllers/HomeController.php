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

        //TODO: Always get new sessionKey from API
        $sessionKey_url = 'http://api2-client.myhemisphere.com/login.xml';
        $client = new Client;
        $results = $client->request('POST', $sessionKey_url, [
            'query' => [
                'username' => "Chanthida",
                'password' => "api_test"
            ]
        ]);
        $xml = simplexml_load_string($results->getBody(),'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);        
        $json_sessionKey = json_decode($json, true);
        $sessionKey = $json_sessionKey['data']['sessionKey'];

        //TODO: GET USER TOKEN from local database
        //$user_token = Auth::user()->token; // This one can be increase system performance if we store sessionKey in database

        //TODO: GET USER TOKEN from API directly
        $user_token = $sessionKey;

        //TODO: GET ALL ACCOUNTS  
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

        //TODO: GET ALL ITEMS
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

        //TODO: GET ITEM ACCOUNT        
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
        
        //TODO: GET ALL ORDERS        
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
        
        //TODO: GET ORDER ITEM
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

        return view('home', compact('accounts', 'items', 'itemAccount', 'orders', 'orderItem'));
        
    }

}
