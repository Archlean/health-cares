<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObAlkes;

class FeedsController extends Controller
{
    public function index(){
        $feedsItem = ObAlkes::paginate(10);
        return view('feeds', ['routes' => 'Feeds', 'data' => $feedsItem]); 
    }
}
