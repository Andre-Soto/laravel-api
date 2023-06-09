<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomersControllers extends Controller
{
    //

    public function index(){
        $url = env('URL_API', 'http://127.0.0.1');
        $response = Http::get($url.'/customer');
        $data = $response->json();
        return view('customers', compact('data'));
    }
}
