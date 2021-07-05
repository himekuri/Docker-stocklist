@extends('layouts.app')

@section('content')

    <div class="page-title">
        <h2>買い出し先登録</h2>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($shop, ['route' => 'shops.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('number', '並び順',['class' => 'd-block']) !!}
                    {!! Form::select('number',App\Category::numbers(),['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('gmap_url', 'GoogleMapのURL（任意）') !!}
                    {!! Form::text('gmap_url', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'orange-btn btn-block']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection