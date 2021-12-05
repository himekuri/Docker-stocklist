@extends('layouts.app')

@section('content')
    <div class="bl_pageTitle">
        <h2>ログイン</h2>
    </div>
    <div class="bl_form">

        {!! Form::open(['route' => 'login.post', 'id' => 'form']) !!}
            <div class="bl_form_group">
                {!! Form::label('email', 'メールアドレス', ['class' => 'bl_form_label']) !!}
                {!! Form::email('email', old('email'), ['class' => 'bl_form_input']) !!}
            </div>

            <div class="bl_form_group">
                {!! Form::label('password', 'パスワード', ['class' => 'bl_form_label']) !!}
                {!! Form::password('password', ['class' => 'bl_form_input']) !!}
            </div>

            {!! Form::submit('ログイン', ['class' => 'el_btn el_btnOrange hp_widthFull is_send', 'disabled']) !!}
        {!! Form::close() !!}

        {{-- ユーザ登録ページへのリンク --}}
        <p class="hp_mt el_editLink">アカウント登録はお済みですか？ {!! link_to_route('signup.get', 'アカウント登録ページへ', [], ['class' => 'hp_colorBlue']) !!}</p>
    </div>
@endsection