@extends('layouts.app')

@section('content')

    <div class="bl_pageTitle">
        <h2>アイテム編集</h2>
    </div>
    <div class="bl_form">
        {!! Form::model($item, ['route' => ['items.update',$item->id],'method' => 'put','files' => true, 'id' => 'form']) !!}

            <div class="bl_form_group">
                {!! Form::label('name', '名前', ['class' => 'bl_form_label']) !!}
                {!! Form::text('name', null, ['class' => 'bl_form_input']) !!}
            </div>

            <div class="bl_form_group">
                {!! Form::label('image_url', '画像',['class' => 'bl_form_label']) !!}
                {!! Form::file('image_url') !!}
            </div>

            <div class="bl_form_group js_radio">
                {!! Form::label('category_select', 'カテゴリー',['class' => 'bl_form_label']) !!}
                @foreach ($categories as $category)
                {!! Form::radio('category_id',$category->id , false) !!}
                {!! Form::label('category_id', $category->name) !!}
                @endforeach
                <div>
                    <a href="/categories/create" class="el_btn el_btnOutlineOrange">＋ カテゴリー追加</a>
                </div>
            </div>

            <div class="bl_form_group js_radio">
                {!! Form::label('shop_select', '買い出し先',['class' => 'bl_form_label']) !!}
                @foreach ($shops as $shop)
                {!! Form::radio('shop_id', $shop->id, false) !!}
                {!! Form::label('shop_id', $shop->name) !!}
                @endforeach
                <div>
                    <a href="/shops/create" class="el_btn el_btnOutlineOrange">＋  買い出し先追加</a>
                </div>
            </div>


            <div class="bl_form_group js_radio">
                {!! Form::label('status', '在庫状況',['class' => 'bl_form_label']) !!}
                {!! Form::radio('status', '0', ($status == '0') ? true : false) !!}
                {!! Form::label('status', '在庫あり') !!}
                {!! Form::radio('status', '1', ($status == '1') ? true : false) !!}
                {!! Form::label('status', '残りわずか') !!}
                {!! Form::radio('status', '2', ($status == '2') ? true : false) !!}
                {!! Form::label('status', '買い出し') !!}
            </div>


            {!! Form::submit('更新', ['class' => 'el_btn el_btnOrange hp_widthFull is_send']) !!}

        {!! Form::close() !!}

        {{-- 削除ボタン --}}
        <div class="hp_textCenter">
            {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                {!! Form::button('削除する', ['class' => "el_btn el_btnDelete", 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection