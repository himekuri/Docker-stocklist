@extends('layouts.app')

@section('content')

    <div class="page-title">
        <h3>買い出し先編集</h3>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($shop, ['route' => ['shops.update',$shop->id],'method' => 'put', 'id' => 'form']) !!}

                <div class="form-group">
                    {!! Form::label('name', '名前', ['class' => 'input-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('number', 'デフォルトの並び順',['class' => 'd-block input-label']) !!}
                    {!! Form::select('number',App\Category::numbers(),['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('gmap_url', 'GoogleMapのURL（任意）', ['class' => 'input-label']) !!}
                    {!! Form::text('gmap_url', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'orange-btn btn-block send']) !!}

            {!! Form::close() !!}

            {{-- 削除ボタン --}}
            <div class="text-center">
                {!! Form::model($shop, ['route' => ['shops.destroy', $shop->id], 'method' => 'delete']) !!}
                    {!! Form::button('削除する', ['class' => "delete-btn", 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection