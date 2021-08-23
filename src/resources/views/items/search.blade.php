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
                            {{-- ステータスに応じたステータスボタンの表示 --}}
                            @if($item->status == 2)
                                <div class="text-danger col-md-3 text-right d-inline-block">買い出し</div>
                            @elseif($item->status == 1)
                                <div class="text-warning col-md-3 text-right d-inline-block">残りわずか</div>
                            @else
                                <div class="text-success col-md-3 text-right d-inline-block">在庫あり</div>
                            @endif
                            </td>
                            <td class="col-3 align-middle">
                                {!! Form::open(['method'=>'put','route'=>['items.status.update',$item->id]]) !!}
                                    <select onchange="submit(this.form)" class="orange-outline-btn btn-sm mb-1" name="status">
                                        <option value="" disabled selected>切り替え</option>
                                        <option value="many">在庫あり</option>
                                        <option value="few">残りわずか</option>
                                        <option value="none">買い出し</option>
                                    </select>
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