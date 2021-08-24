@extends('layouts.app')

@section('content')
<div class="page-title">
    <h2>カテゴリー登録</h2>
</div>
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        {!! Form::model($category, ['route' => 'categories.store']) !!}

            <div class="form-group">
                {!! Form::label('name', '名前') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('number', '並び順',['class' => 'd-block']) !!}
                {!! Form::select('number',App\Category::numbers(),['class' => 'form-control'] ) !!}

            </div>

            {!! Form::submit('登録', ['class' => 'orange-btn btn-block send', 'disabled']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection