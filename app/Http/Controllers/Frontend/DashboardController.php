<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\HomeAboutTitle;
use App\Model\HomeAbout;
use App\Model\Homeservice;
use App\Model\Slider;
use App\Model\Product;
use App\Model\HomeInfo;
use App\Model\ProductColor;
use App\Model\ProductSize;

class DashboardController extends Controller
{
    public function dashboard(){

        return view ('frontend.single_pages.customer-dashboard');
    }
}



