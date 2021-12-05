@extends('layouts.app')

@section('content')

    <div class="bl_pageTitle">
        <h3>買い出し先編集</h3>
    </div>
    <div class="bl_form">
        {!! Form::model($shop, ['route' => ['shops.update',$shop->id],'method' => 'put', 'id' => 'form']) !!}

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

            {!! Form::submit('更新', ['class' => 'el_btn el_btnOrange hp_widthFull is_send']) !!}

        {!! Form::close() !!}

        {{-- 削除ボタン --}}
        <div class="hp_textCenter">
            {!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                {!! Form::button('削除する', ['class' => "el_btn el_btnDelete", 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection