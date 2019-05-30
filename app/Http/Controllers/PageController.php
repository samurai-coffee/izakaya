<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $categoryWord = 'すべて';
        // 店データ取得
        $list = Shop::all();
        return view('page.index', ['list' => $list,'categoryWord' => $categoryWord]);        
    }

    public function getCategory($word) 
    {
        $categoryWord = $word;
       // カテゴリーごとに検索する
        $list = Shop::where('category',$word)->get();
        return view('page.index', ['list' => $list,'categoryWord' => $categoryWord]);  
       
    }
    
}