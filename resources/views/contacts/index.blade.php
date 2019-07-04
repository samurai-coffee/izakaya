<div class="container">
    <div class="row">
        <div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">予約</div>
<div class="panel-body">
{{-- エラーの表示 --}}
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

{!! Form::open(['url' => '/confirm',
'class' => 'form-horizontal']) !!}



<div class="form-group{{ $errors->has('reserve_at') ? ' has-error' : '' }}">
{!! Form::label('reserve_at', '予約日:', ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-10">
{!! Form::text('reserve_at', null, ['class' => 'form-control']) !!}

@if ($errors->has('reserve_at'))
<span class="help-block">
<strong>{{ $errors->first('reserve_at') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
{!! Form::label('time', '時間帯:', ['class' => 'col-sm-2 control-label']) !!}
<div class="col-sm-10">
{!! Form::text('time', null, ['class' => 'form-control']) !!}
@if ($errors->has('time'))
<span class="help-block">
<strong>{{ $errors->first('time') }}</strong>
</span>
@endif
</div>
</div>

{{Form::hidden('shop_id', $shop_id)}}
{{Form::hidden('user_id', $user_id)}}

<div class="form-group">
<div class="col-sm-10 col-sm-offset-2">
{!! Form::submit('確認', ['class' => 'btn btn-primary']) !!}
</div>
</div>

{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>