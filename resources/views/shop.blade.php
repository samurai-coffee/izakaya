@extends('layout')
@section('title', 'いざかやマッチ')
@section('content')
@include('nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">店舗情報登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('shop_info') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $shop->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="lat" class="col-md-4 col-form-label text-md-right">{{ __('lat') }}</label>

                            <div class="col-md-6">
                                <input id="lat" type="text" class="form-control{{ $errors->has('lat') ? ' is-invalid' : '' }}" name="lat" value="{{ old('lat', $shop->lat) }}" required autofocus>

                                @if ($errors->has('lat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="lng" class="col-md-4 col-form-label text-md-right">{{ __('lng') }}</label>

                            <div class="col-md-6">
                                <input id="lng" type="text" class="form-control{{ $errors->has('lng') ? ' is-invalid' : '' }}" name="lng" value="{{ old('lng', $shop->lng) }}" required autofocus>

                                @if ($errors->has('lng'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lng') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message">{{ old('message', $shop->message) }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                            <div class="col-md-6">
                                <textarea id="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel">{{ old('tel', $shop->tel) }}</textarea>

                                @if ($errors->has('tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			
		                 <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                       {{Form::select('category', 
                                           ['和食' => '和食',
                                           '中華' => '中華',
                                           '洋食' => '洋食']
                                        )}}

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" 
                                name="address">{{ old('address', $shop->address) }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('店舗画像') }}</label>
                            <div class="col-md-6">
                            @if ($shop->photo_path)
                                <p>
                                    <img src="{{ $shop->photo_path }}"/>
                                </p>
                            @endif
                            <input name="file" type="file" id="file">
                             </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
