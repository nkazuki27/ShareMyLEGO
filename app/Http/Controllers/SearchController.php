<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;

class SearchController extends Controller
{
    public function index($id)
    {
        $keyword = \Request::query('keyword');

        $client = new RakutenRws_Client();
        $client->setApplicationId( config('app.rakuten_id') );

        $response = $client->execute('IchibaItemSearch', array(
            'keyword' => "LEGO ".$keyword,
        ));

        if ($response->isOk()) {
            $items = array();
            foreach ($response as $item){
                $str = str_replace("_ex=128x128", "_ex=175x175", $item['mediumImageUrls'][0]['imageUrl']);
                $items[] = array(
                    'itemName' => $item['itemName'],
                    'itemPrice' => $item['itemPrice'],
                    'itemUrl' => $item['itemUrl'],
                    'mediumImageUrls' => $str,
                    'siteIcon' => "../images/rakuten_logo.png",
                );
            }
        }

        return view('rakuten', compact('id','keyword', 'items'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $keyword = $data['keyword'];
        $id = $data['id'];

        $client = new RakutenRws_Client();
        $client->setApplicationId( config('app.rakuten_id') );
        $response = $client->execute('IchibaItemSearch', array(
            'keyword' => "LEGO ".$keyword,
        ));

        $items = array();
        if ($response->isOk()) {
            foreach ($response as $item){
                $str = str_replace("_ex=128x128", "_ex=175x175", $item['mediumImageUrls'][0]['imageUrl']);
                $items[] = array(
                    'itemName' => $item['itemName'],
                    'itemPrice' => $item['itemPrice'],
                    'itemUrl' => $item['itemUrl'],
                    'mediumImageUrls' => $str,
                    'siteIcon' => "../images/rakuten_logo.png",
                );
            }
        }

        return view('rakuten', compact('id','keyword', 'items'));
    }
}
