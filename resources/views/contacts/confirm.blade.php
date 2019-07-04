<div class="container">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">予約</div>
<div class="panel-body">
<p>誤りがないことを確認のうえ送信ボタンをクリックしてください。</p>

<table class="table">
<tr>
<th>予約日</th>
<td>{{ $contact->reserve_at }}</td>
</tr>
<tr>
<th>お名前</th>
<td>{{ $contact->user->name }}</td>
</tr>
<tr>
<th>メールアドレス</th>
<td>{{ $contact->user->email }}</td>
</tr>
<tr>
<th>時間帯</th>
<td>{{ $contact->time }}</td>
</tr>
</table>

{!! Form::open(['url' => '/complete',
'class' => 'form-horizontal',
'id' => 'post-input']) !!}

@foreach($contact->getAttributes() as $key => $value)
@if(isset($value))
@if(is_array($value))
@foreach($value as $subValue)
<input name="{{ $key }}[]" type="hidden" value="{{ $subValue }}">
@endforeach
@else
{!! Form::hidden($key, $value) !!}
@endif

@endif
@endforeach

{!! Form::submit('戻る', ['name' => 'action', 'class' => 'btn']) !!}
{!! Form::submit('送信', ['name' => 'action', 'class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>