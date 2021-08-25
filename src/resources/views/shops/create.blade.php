@extends('layouts.app')

@section('content')

    <div class="page-title">
        <h2>買い出し先登録</h2>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($shop, ['route' => 'shops.store', 'id' => 'form']) !!}

                <div class="form-group">
                    {!! Form::label('name', '名前', ['class' => 'input-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('number', '並び順',['class' => 'd-block input-label']) !!}
                    {!! Form::select('number',App\Category::numbers(),['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('gmap_url', 'GoogleMapのURL（任意）', ['class' => 'input-label']) !!}
                    {!! Form::text('gmap_url', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'orange-btn btn-block send', 'disabled']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection