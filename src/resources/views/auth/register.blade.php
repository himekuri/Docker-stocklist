@extends('layouts.app')

@section('content')
    <div class="page-title">
        <h2>アカウント登録</h2>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'signup.post', 'id' => 'form']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'お名前', ['class' => 'input-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス', ['class' => 'input-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード', ['class' => 'input-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認', ['class' => 'input-label']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'orange-btn btn-block send', 'disabled']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection