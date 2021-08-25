@extends('layouts.app')

@section('content')
    <div class="page-title">
        <h2>ログイン</h2>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post', 'id' => 'form']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'orange-btn btn-block send', 'disabled']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2">アカウント登録はお済みですか？ {!! link_to_route('signup.get', 'アカウント登録ページへ') !!}</p>
        </div>
    </div>
@endsection