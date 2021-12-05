@extends('layouts.app')

@section('content')
    <div class="bl_pageTitle">
        <h2>アカウント登録</h2>
    </div>
    {{-- ./bl_pageTitle--}}

    <div class="bl_form">
        {!! Form::open(['route' => 'signup.post', 'id' => 'form']) !!}
            <div class="bl_form_group">
                {!! Form::label('name', 'お名前', ['class' => 'bl_form_label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'bl_form_input']) !!}
            </div>

            <div class="bl_form_group">
                {!! Form::label('email', 'メールアドレス', ['class' => 'bl_form_label']) !!}
                {!! Form::email('email', old('email'), ['class' => 'bl_form_input']) !!}
            </div>

            <div class="bl_form_group">
                {!! Form::label('password', 'パスワード', ['class' => 'bl_form_label']) !!}
                {!! Form::password('password', ['class' => 'bl_form_input']) !!}
            </div>

            <div class="bl_form_group">
                {!! Form::label('password_confirmation', 'パスワード確認', ['class' => 'bl_form_label']) !!}
                {!! Form::password('password_confirmation', ['class' => 'bl_form_input']) !!}
            </div>

            {!! Form::submit('登録', ['class' => 'el_btn el_btnOrange hp_widthFull is_send', 'disabled']) !!}
        {!! Form::close() !!}
    </div>

@endsection