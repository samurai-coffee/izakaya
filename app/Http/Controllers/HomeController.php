<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Shop;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function avatar()
    {
        $user = User::find(auth()->id());
        return view('auth.avatar', compact('user'));
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
                // 最小縦横120px 最大縦横400px
                'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            // S3にアップロード
            $path = $request->file->store('avatar', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $url = Storage::disk('s3')->url($path);

            // パスをDBに保存
            $user = User::find(auth()->id());
            $user->avatar_path = $url;
            $user->save();

            return redirect('/avatar')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
       // ショップ情報の表示
    public function getShopInfo()
    {
        $shop = Shop::where('user_id',auth()->id())->first();
	    if (!isset($shop)) {
            $shop = new Shop();
        }
        return view('shop',compact('shop'));
    }
    
    public function getShopDetail($id)
    {
        $shop = Shop::find($id);
	    if (!isset($shop)) {
            $shop = new Shop();
        }
        return view('shop_detail',compact('shop'));
    }
    
    // ショップ情報の更新
    public function postShopInfo(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:20',
            'message' => 'required|max:255',
            'address' => 'required|max:255',
            'tel'  => 'required|max:20',
        ]);
 
        //バリデート
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
        
        $shop = Shop::where('user_id',auth()->id())->first();
        if (!isset($shop)) {
            $shop = new Shop();
        }
        // 新規追加
        $shop->name = $request->name;
        $shop->message = $request->message;
        $shop->address = $request->address;
        $shop->tel = $request->tel;
        $shop->category = $request->category;
        $shop->lat = $request->lat;
        $shop->lng = $request->lng;
        $shop->photo_path = '';
        $shop->user_id = auth()->id();
        $shop->save();
        
        if ($request->file('file')->isValid([])) {
            // S3にアップロード
            $path = $request->file->store('shop_image', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $url = Storage::disk('s3')->url($path);

            // パスをDBに保存
            $shop = Shop::where('user_id',auth()->id())->first();
            $shop->photo_path = $url;
            $shop->save();

        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
        return $this->getShopInfo();
    }
    public function getShopImage()
    {
        $shop = Shop::where('user_id',auth()->id())->first();
	    if (!isset($shop)) {
            $shop = new Shop();
        }
        return view('shop_image',compact('shop'));
    }
    public function uploadShopImage(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
                // 最小縦横120px 最大縦横400px
                'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            // S3にアップロード
            $path = $request->file->store('shop_image', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $url = Storage::disk('s3')->url($path);

            // パスをDBに保存
            $shop = Shop::where('user_id',auth()->id())->first();
            $shop->photo_path = $url;
            $shop->save();

            return redirect('/shop_image')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
    
}
