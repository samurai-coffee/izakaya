@extends('layout')
@section('title', 'いざかやマッチ')
@section('content')
    
@include('nav')
    <div class="container">
        
    <!-- content -->
        <div class="row" style="padding:60px 0 0 0">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        オススメ
                    </div>
                    <!-- 敢えてbodyを作らないことで、メニューを詰める -->
                    <!-- <div class="panel-body"> -->
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href='/category/和食'>和食</a></li>
                        <li><a href='/category/中華'>中華</a></li>
                        <li><a href='/category/洋食'>洋食</a></li>
                    </ul> 
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
                <h1><small>オススメ->{{ $categoryWord }}</small></h1>
                </div>
                <div class="row">
                    <!-- この単位を繰り返す -->
                    @foreach($list as $val)
                    <div class="col-md-4">
                        <div class="thumbnail" style="text-align:center;padding-top:10px;">
                            <a href="{{ route('/shop_detail',$val->id) }}">
                                @if ($val->photo_path)
                                        <img src="{{ $val->photo_path }}"/>
                                @endif
                            </a>
                            <div class="caption">
                                <p><b>{{$val->name}}</b></p>
                                <p>{{$val->message}}</p>
                                <p style="margin-bottom:0px"><a href="{{ route('/shop_detail',$val->id) }}" class="btn btn-primary">詳細を見る</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                   
    
                </div><!-- end row -->
            </div>

        </div>
    </div>

<div id="footer" style="background-color:#ccc">footer
</div>

@endsection
