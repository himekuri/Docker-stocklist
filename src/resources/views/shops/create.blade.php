@extends('layouts.app')

@section('content')

    <div class="bl_pageTitle">
        <h2>買い出し先登録</h2>
    </div>
    <div class="bl_form">
        {!! Form::model($shop, ['route' => 'shops.store', 'id' => 'form']) !!}

            <div class="bl_form_group">
                {!! Form::label('name', '名前', ['class' => 'bl_form_label']) !!}
                {!! Form::text('name', null, ['class' => 'bl_form_input']) !!}
            </div>

            <div class="bl_form_group">
                {!! Form::label('number', 'デフォルトの並び順',['class' => 'bl_form_label']) !!}
                {!! Form::select('number',App\Category::numbers(),['class' => 'bl_form_input'] ) !!}
            </div>

            <div class="bl_form_group">
                {!! Form::label('gmap_url', 'GoogleMapのURL（任意）', ['class' => 'bl_form_label']) !!}
                {!! Form::text('gmap_url', null, ['class' => 'bl_form_input']) !!}
            </div>

            {!! Form::text('url', url()->previous(), ['style' => 'display:none;']) !!}
            {!! Form::submit('登録', ['class' => 'el_btn el_btnOrange hp_widthFull is_send', 'disabled']) !!}

        {!! Form::close() !!}
    </div>
@endsection