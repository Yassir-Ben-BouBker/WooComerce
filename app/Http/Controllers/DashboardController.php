<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Session;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function auth(){
        return view('dashboard.auth');
    }

    public function logout(){
        Session::put('woo_host','foo');
        Session::put('woo_key','foo');
        Session::put('woo_secret','foo');
        return redirect('/');
    }

    // connection
    public function connection(Request $request){
        $woocommerce = new Client(
            $request->host, 
            $request->key, 
            $request->secret,
            [
                'wp_api' => true,
                'version' => 'wc/v3',
            ]
        );
        $woocommerce->get("customers");
        Session::put('woo_host',$request->host);
        Session::put('woo_key',$request->key);
        Session::put('woo_secret',$request->secret);
        Session::save();
        
        return redirect('/dashboard/products');
    }

    
}
