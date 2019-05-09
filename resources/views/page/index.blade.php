@extends('layout')
@section('title', 'いざかやマッチ')
@section('content')

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">いざかやマッチ</a>
        </div>
      </div>
    </nav>
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
                        <li><a href="">和風</a></li>
                        <li><a href="">洋風</a></li>
                        <li><a href="">中華</a></li>
                    </ul> 
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
                <h1><small>オススメ->和風</small></h1>
                </div>
                <div class="row">
                    <!-- この単位を繰り返す -->
                    @foreach($list as $val)
                    <div class="col-md-4">
                        <div class="thumbnail" style="text-align:center;padding-top:10px;">
                            <a href="">
                                <img src="{{ url('/img/9394076.jpg') }}"/>
                            </a>
                            <div class="caption">
                                <p><b>{{$val->name}}</b></p>
                                <p>{{$val->message}}</p>
                                <p style="margin-bottom:0px"><a href="" class="btn btn-primary">詳細を見る</a></p>
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
