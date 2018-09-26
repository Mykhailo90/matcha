<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index(){
        $url_data = [
            array(
                'title' => 'DKA-DEVELOP',
                'url' => 'https://dka-develop.ru'
            ),
            array(
                'title' => 'YouTube',
                'url' => 'http://youtube.com'
            )
            ]; 

        return view('start', [
            'url_data' => $url_data
        ]);
    }

    public function getJson(){
        return [
            array(
                'title' => 'DKA-DEVELOP',
                'url' => 'https://dka-develop.ru'
            ),
            array(
                'title' => 'YouTube',
                'url' => 'http://youtube.com'
            )
            ]; 
    }
}
