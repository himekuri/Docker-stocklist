@extends('layouts.app')

@section('content')

    <div class="col-md-6 text-center">
        <h3>買い出し先登録</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
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

                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block mt-5']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection