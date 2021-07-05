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
            {{-- 商品追加ボタン --}}
            <div class="text-center">
                <a href="/items/create" class="mb-3 orange-btn">アイテム追加</a>
            </div>

            {{-- 検索フォーム --}}
            {!! Form::open(['method'=>'get','route'=>['items.serch']]) !!}
                <div class="search-form">
                    {!! Form::text('name', null, ['class' => 'search-box', 'placeholder'=>'商品を検索..']) !!}
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
                                <td class="col-1"><img src="{{ $item->image_url }}" alt="画像"></td>
                                {{-- 買い出し先名を押すと編集ページへ飛ぶ --}}
                                <td class="col-2 align-middle text-left">
                                    {!! link_to_route('items.edit', $item->name, ['item' => $item->id]) !!}
                                </td>
                                <td class="w-25 align-middle">
                                    {{-- ステータスに応じたステータスボタンの表示 --}}
                                    @if($item->status == 2)
                                        <button type="button" class="btn btn-danger btn-sm mb-1">買い出し</button>
                                        {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id,'caution']]) !!}
                                            {!! Form::submit('要注意',['name' => 'few','class'=>'btn btn-outline-warning btn-sm mb-1']) !!}
                                        {!! Form::close() !!}
                                        {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id,'ok']]) !!}
                                            {!! Form::submit('在庫あり',['name' => 'many','class'=>'btn btn-outline-success btn-sm mb-1']) !!}
                                        {!! Form::close() !!}
                                    @elseif($item->status == 1)
                                        {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id,'buy']]) !!}
                                            {!! Form::submit('買い出し',['name' => 'none','class'=>'btn btn-outline-danger btn-sm mb-1']) !!}
                                        {!! Form::close() !!}
                                        <button type="button" class="btn btn-warning btn-sm mb-1">要注意</button>
                                        {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id,'ok']]) !!}
                                            {!! Form::submit('在庫あり',['name' => 'many','class'=>'btn btn-outline-success btn-sm mb-1']) !!}
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id,'buy']]) !!}
                                            {!! Form::submit('買い出し',['name' => 'none','class'=>'btn btn-outline-danger btn-sm mb-1']) !!}
                                        {!! Form::close() !!}
                                        {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id,'caution']]) !!}
                                            {!! Form::submit('要注意',['name' => 'few','class'=>'btn btn-outline-warning btn-sm mb-1']) !!}
                                        {!! Form::close() !!}
                                        <button type="button" class="btn btn-success btn-sm mb-1">在庫あり</button>
                                    @endif
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
                    <h3>さっそく商品を登録してみましょう！</h3>
                    <p>(例) トマト、割り箸</p>
                    <p class="text-danger">＜※カテゴリー、買い出し先から先に登録してください＞</p>
                    {{-- 登録ページへのリンク --}}
                    {!! link_to_route('items.create', '商品を新規作成', [], ['class' => 'orange-btn btn-lg']) !!}
                </div>
            </div>
        @endif
    </div>
@endsection