<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // 店データ取得
        $list = Shop::all();
        return view('page.index', ['list' => $list]);        
    }
}
