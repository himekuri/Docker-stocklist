@extends('layouts.app')

@section('content')
    {{-- タブ切り替え --}}
    <nav class="nav nav-tabs nav-fill mt-4">
        <a class="nav-item nav-link  active" href="/">在庫確認</a>
        <a class="nav-item nav-link bg-light mb-0" href="/lists">買い出しリスト</a>
    </nav>
    <div class="main">
        {{-- アイテムの登録があるとき --}}
        @if (count($items)>0)
            {{-- アイテム追加ボタン --}}
            <div class="text-center">
                <a href="/items/create" class="mb-3 orange-btn">アイテム追加</a>
            </div>

            {{-- 検索フォーム --}}
            {!! Form::open(['method'=>'get','route'=>['items.search']]) !!}
                <div class="search-form">
                    {!! Form::text('name', null, ['class' => 'search-box', 'placeholder'=>'アイテムを検索..']) !!}
                    {!! Form::button('<i class="fas fa-search"></i>', ['class' => 'search-btn', 'type' => 'submit']) !!}
                </div>
            {!! Form::close() !!}

            {{-- アイテム一覧をカテゴリーごとに表示 --}}
            @foreach ($categories as $category)
                {{-- カテゴリー名 --}}
                <div class="category-shop-title pl-2">{{$category->name}}</div>
                {{-- カテゴリーに登録がない時の表示 --}}
                @if (count($category->items)==0)
                    <div class="text-center pt-2"><p>登録されていません</p></div>
                @endif
                {{-- カテゴリー内のアイテム --}}
                <table class="table">
                    <tbody>
                        @foreach($category->items as $item)
                            <tr>
                                <td class="col-1"><img src="{{ $item->image_url }}" alt="画像" width="50" height="50"></td>
                                {{-- 買い出し先名を押すと編集ページへ飛ぶ --}}
                                <td class="align-middle">
                                    <div class="col-md-8  d-inline-block edit-link">{!! link_to_route('items.edit', $item->name, ['item' => $item->id]) !!}</div>
                                </td>
                                {{-- ステータスに応じたステータスボタンの表示 --}}
                                <td class="col-3 align-middle">
                                    {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id]]) !!}
                                        {{
                                            Form::select(
                                                'status',
                                                ['many' =>'在庫あり', 'few' => '残りわずか', 'none' => '買い出し'],
                                                ['many', 'few', 'none'][$item->status],
                                                array(
                                                    'class' => ['green', 'orange', 'red'][$item->status].'-outline-btn btn-sm mb-1',
                                                    'onchange' => 'submit(this.form)'
                                                )
                                            )
                                        }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @else
            {{-- アイテムの登録がないとき --}}
            <div class="center jumbotron">
                <div class="text-center">
                    <h3>さっそくアイテムを登録してみましょう！</h3>
                    <p>(例) トマト、割り箸</p>
                    <p class="text-danger">＜※カテゴリー、買い出し先から先に登録してください＞</p>
                    {{-- 登録ページへのリンク --}}
                    {!! link_to_route('items.create', 'アイテムを新規作成', [], ['class' => 'orange-btn btn-lg']) !!}
                </div>
            </div>
        @endif
    </div>
    <example-component :data="{{ json_encode(['title' => $title]) }}"></example-component>
@endsection
