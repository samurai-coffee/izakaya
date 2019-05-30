@extends('layout')
@section('title', 'いざかやマッチ')
@section('content')
@include('nav')
<div class="main">
    <div class="row mapview">
    <!--マップ表示-->
        <div class="col-lg-8 col-sm-12 map" >
            <h3>気になるお店をチェックする</h3>
            <div id="map" style="width:100%; height:90%;"></div>
        </div>
    
        <!-- Map入力フォーム -->
        <h3>お店紹介</h3>
    
        お店の名前 
        <br>
        {{$shop->name}}
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
