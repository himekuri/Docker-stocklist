@extends('layouts.app')

@section('content')

    <div class="bl_pageTitle">
        <h2>カテゴリー編集</h2>
    </div>
    <div class="bl_form">
        {!! Form::model($category, ['route' => ['categories.update', $category->id ],'method' => 'put', 'id' => 'form']) !!}

            <div class="bl_form_group">
                {!! Form::label('name', '名前', ['class' => 'bl_form_label']) !!}
                {!! Form::text('name', null, ['class' => 'bl_form_input']) !!}
            </div>

            <div class="bl_form_group">
                {!! Form::label('number', 'デフォルトの並び順',['class' => 'bl_form_label']) !!}
                <div class="bl_selectWrap">
                {!! Form::select('number',App\Category::numbers(),['class' => 'bl_form_input'] ) !!}
                </div>

            </div>
            {!! Form::submit('更新', ['class' => 'el_btn el_btnOrange hp_widthFull is_send']) !!}
        {!! Form::close() !!}
        {{-- 削除ボタン --}}
        <div class="hp_textCenter">
            {!! Form::model($category, ['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                {!! Form::button('削除する', ['class' => "el_btn el_btnDelete", 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection