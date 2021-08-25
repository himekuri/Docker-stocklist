@extends('layouts.app')

@section('content')
    <nav class="nav nav-tabs nav-fill mt-4">
        <a class="nav-item nav-link  active" href="/">在庫確認</a>
        <a class="nav-item nav-link bg-light mb-0" href="/lists">買い出しリスト</a>
    </nav>
    <div class="main">
        @if (count($items)>0)
            {!! Form::open(['method'=>'get','route'=>['items.search']]) !!}
                <div class="search-form">
                    {!! Form::text('name', null, ['class' => 'search-box', 'placeholder'=>'アイテムを検索..']) !!}
                    {!! Form::button('<i class="fas fa-search"></i>', ['class' => 'search-btn', 'type' => 'submit']) !!}
                </div>
            {!! Form::close() !!}
            <div class="category-shop-title pl-2">検索結果：{{$keyword_name}}</div>
            <table class="table">
                <tbody>
                    @foreach($items as $item)
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
        @else
            <div class="text-center">
                <p>検索結果はありません</p>
            </div>
        @endif
    </div>

@endsection