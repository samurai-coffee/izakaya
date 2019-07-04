@extends('layout')
@section('title', 'いざかやマッチ')
@section('content')
@include('nav')
<div class="main">
    <div class="row mapview">
    <!--マップ表示-->
        <div class="col-sm-12 map" >
            <h3>気になるお店をチェックする</h3>
            <div id="map" style="width:100%; height:90%;"></div>
        </div>
        <div class="col-sm-2">
        </div>
        <!-- Map入力フォーム -->
        <div class="col-sm-10">
            <h3>お店紹介</h3>
            
            お店の名前
            <br>
            <span class="shop_name">{{$shop->name}}</span>
            <br>
        
            住所
            <br>
            {{$shop->address}}
            <br>
            
            電話番号
            <br>
            {{$shop->tel}}
            <br>
        
            カテゴリー
            <br>
            {{$shop->category}}
            <br>
        
            お店に関する情報（20字から500字まで）
            <br>
            {{$shop->message}}
        
            お店の画像
            <br>
            @if ($shop->photo_path)
                <img src="{{ $shop->photo_path }}" class="imgview"/>
            @endif
            <br>
            <a href="/contact/{{ $shop->id}}">予約する</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZzBjb_fhaHXvLDQ0z4PMhbehkAxdeIxc"></script> 
<script type="text/javascript"> 
    var latlng = new google.maps.LatLng('{{ $shop->lat }}','{{ $shop->lng }}'); 
    var myOptions = { 
      zoom: 15, 
      center: latlng, 
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    }; 
    var map = new google.maps.Map(document.getElementById("map"), myOptions);  

    var marker = new google.maps.Marker({
       position: latlng,
       map: map,
       title:"{{ $shop->name }}"
    });
</script>
@endsection
