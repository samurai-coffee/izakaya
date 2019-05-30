@extends('layout')
@section('title', 'いざかやマッチ')
@section('content')
@include('nav')

{{ Form::open(['url' => '/shop_image_upload', 'method' => 'post', 'files' => true]) }}

@if ($errors->any())
    <div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

<div>
    @if ($shop->photo_path)
        <p>
            <img src="{{ $shop->photo_path }}"/>
        </p>
    @endif
    {{ Form::label('file', '店舗画像アップロード') }}
    {{ Form::file('file') }}
</div>

<div>
    {{ Form::submit('アップロード') }}
</div>
{{ Form::close() }}
@endsection