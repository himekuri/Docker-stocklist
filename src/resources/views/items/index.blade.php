@extends('layouts.app')

@section('content')
    {{-- タブ切り替え --}}
    <nav class="bl_mainTab">
        <a class="bl_mainTab_item active" href="/">在庫確認</a>
        <a class="bl_mainTab_item" href="/lists">買い出しリスト</a>
    </nav>
    <div class="bl_main hp_textCenter">
        {{-- アイテムの登録があるとき --}}
        @if (count($items)>0)
            {{-- アイテム追加ボタン --}}
            <div class="hp_textCenter hp_mb el_btn el_btnOrange">
                <a href="/items/create">アイテム追加</a>
            </div>

            {{-- 検索フォーム --}}
            {!! Form::open(['method'=>'get','route'=>['items.search']]) !!}
                <div class="bl_searchForm hp_textLeft">
                    {!! Form::text('name', null, ['class' => 'bl_searchBox', 'placeholder'=>'アイテムを検索..']) !!}
                    {!! Form::button('<i class="fas fa-search"></i>', ['class' => 'bl_searchBtn', 'type' => 'submit']) !!}
                </div>
            {!! Form::close() !!}

            {{-- アイテム一覧をカテゴリーごとに表示 --}}
            @foreach ($categories as $category)
            @if (count($category->items) >= 1)
                {{-- カテゴリー名 --}}
                <div class="hp_textLeft bl_CategoryTitle">{{$category->name}}</div>
                {{-- カテゴリー内のアイテム --}}
                <table class="bl_table">
                    <tbody>
                        @foreach($category->items as $item)
                            <tr>
                                <td class="el_itemImg"><img src="{{ $item->image_url }}" alt="画像" width="50" height="50"></td>
                                {{-- 買い出し先名を押すと編集ページへ飛ぶ --}}
                                <td>
                                    <div class="el_editLink">{!! link_to_route('items.edit', $item->name, ['item' => $item->id]) !!}</div>
                                </td>
                                {{-- ステータスに応じたステータスボタンの表示 --}}
                                <td class="hp_textRight">
                                    {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id]]) !!}
                                    <div class="bl_selectWrap">
                                        {{
                                            Form::select(
                                                'status',
                                                ['many' =>'在庫あり', 'few' => '残りわずか', 'none' => '買い出し'],
                                                ['many', 'few', 'none'][$item->status],
                                                array(
                                                    'class' => 'el_btn el_btnOutline'.['Green', 'Orange', 'Red'][$item->status],
                                                    'onchange' => 'submit(this.form)'
                                                )
                                            )
                                    }}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            @endforeach
        @else
            {{-- アイテムの登録がないとき --}}
            <div class="hp_textCenter">
                <div class="hp_textCenter">
                    <p><img class="bl_firstGuideImg" src="img/item-guide.png" alt="さっそくアイテムを登録してみましょう！"></p>
                    {{-- 登録ページへのリンク --}}
                    {!! link_to_route('items.create', 'アイテムを新規登録', [], ['class' => 'hp_mb el_btn el_btnOrange']) !!}
                </div>
            </div>
        @endif
    </div>
@endsection