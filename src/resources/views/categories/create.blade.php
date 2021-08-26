@extends('layouts.app')

@section('content')
<div class="page-title">
    <h2>カテゴリー登録</h2>
</div>
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        {!! Form::model($category, ['route' => 'categories.store', 'id' => 'form']) !!}

            <div class="form-group">
                {!! Form::label('name', '名前', ['class' => 'input-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('number', 'デフォルトの並び順',['class' => 'd-block input-label']) !!}
                {!! Form::select('number',App\Category::numbers(),['class' => 'form-control'] ) !!}

            </div>

            {!! Form::text('url', url()->previous(), ['style' => 'display:none;']) !!}
            {!! Form::submit('登録', ['class' => 'orange-btn btn-block send', 'disabled']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection