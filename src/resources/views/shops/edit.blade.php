@extends('layouts.app')

@section('content')

    <div class="page-title">
        <h3>買い出し先編集</h3>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($shop, ['route' => ['shops.update',$shop->id],'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('number', '並び順',['class' => 'd-block']) !!}
                    {!! Form::select('number',App\Category::numbers(),['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('gmap_url', 'GoogleMapのURL（任意）') !!}
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