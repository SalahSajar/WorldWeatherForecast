<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserLocationController extends Controller
{
    public function index(){
        $current_ip_addr = $_SERVER['REMOTE_ADDR'];
        $yourUserIpAddress = '66.102.0.0';

        $location = Location::get($yourUserIpAddress);
        
        return view('user-location.index', compact('location'));
    }
}