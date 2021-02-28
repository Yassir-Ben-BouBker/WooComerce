<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Session;

class ConnectionController extends Controller
{
    public $woocommerce;

    public function __construct(){
        $this->woocommerce = new Client(
            Session::get('woo_host'),
            Session::get('woo_key'),
            Session::get('woo_secret'),
            [
                'wp_api' => true,
                'version' => 'wc/v3',
            ]
        );
    }

    
}
