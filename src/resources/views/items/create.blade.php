@extends('layouts.app')

@section('content')

    <div class="bl_pageTitle">
        <h2>アイテム登録</h2>
    </div>
    <div class="bl_form">
        {!! Form::model($item, ['route' => 'items.store','files' => true, 'id' => 'form']) !!}

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

            {{-- ステータスの登録 --}}
            <div class="bl_form_group js_radio">
                {!! Form::label('status', '在庫状況',['class' => 'bl_form_label']) !!}
                {!! Form::radio('status', '0', true) !!}
                {!! Form::label('status', '在庫あり') !!}
                {!! Form::radio('status', '1', false) !!}
                {!! Form::label('status', '残りわずか') !!}
                {!! Form::radio('status', '2', false) !!}
                {!! Form::label('status', '買い出し') !!}
            </div>
            <div class="bl_form_createButtun">
                {!! Form::submit('登録', ['class' => 'el_btn el_btnYellow hp_widthHalf is_send', 'disabled']) !!}
                {!! Form::submit('続けて登録', ['name' => 'continue', 'class' => 'el_btn el_btnOrange hp_widthHalf is_send', 'disabled']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@endsection