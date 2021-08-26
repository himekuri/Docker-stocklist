@extends('layouts.app')
@section('content')
    {{-- タブ切り替え --}}
    <nav class="nav nav-tabs nav-fill mt-4">
        <a class="nav-item nav-link bg-light mb-0" href="/">在庫確認</a>
        <a class="nav-item nav-link active" href="/lists">買い出しリスト</a>
    </nav>
    <div class="main">
        <div class="text-center mb-3">
            {{-- LINEで送るボタン --}}
            <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url= {{ route('users.autoLogin', ['token' => \Auth::user()->secret_token]) }} data-color="default" data-size="large" data-count="false" style="display: none;"></div>
        </div>

        {{-- 表示の絞り込み機能 --}}
        <div class = "mb-3 filter-group">
            <button type="button" class="filter-btn orange-btn mb-1" onclick="location.href='/lists/filter'">　買い出しのみ　</button>
            <button type="button" class="filter-btn orange-btn mb-1" disabled>残りわずかも含む</button>
        </div>

        {{-- 買い出し・残りわずかがあるとき買い出し先ごとに一覧で表示する --}}
        @if (count($items)>0)
            <div class="mb-3">
                {!! Form::open(['method'=>'get','route'=>['lists.index']]) !!}
                    {!! Form::label('shops_sort', '並び替え',['class' => 'sort-label']) !!}
                    {{
                        Form::select(
                            'shops_sort',
                            ['default' =>'デフォルト', 'name_asc' => '名前 ：昇順', 'name_desc' => '名前 ：降順'],
                            $select,
                            ['class' => 'black-outline-btn btn-sm', 'onchange' => 'submit(this.form)']
                        )
                    }}
                {!! Form::close() !!}
            </div>
            <form method="post" action="{{ route('lists.update') }}">
                @csrf
                @method('put')
                @foreach ($shops as $shop)
                @if (count($shop->items->whereIn('status',[1,2])) >= 1)
                    {{-- 買い出し先の名前を表示する --}}
                    <div class="category-shop-title pl-2">{{$shop->name}}</div>
                    <table class="table">
                        <tbody>
                            @foreach($shop->items->whereIn('status',[1,2]) as $item)
                                <tr>
                                    <td class="col-1"><img src="{{ $item->image_url }}" alt="画像" width="50" height="50"></td>
                                    <td class="align-middle">
                                        <div class="col-md-8  d-inline-block">{{$item->name}}</div>
                                    {{-- ステータスに応じて買い出し・残りわずかを表示する --}}
                                    @if($item->status == 2)
                                        <div class="text-danger col-md-3  d-inline-block">買い出し</div>
                                    </td>
                                    @else
                                        <div class="text-warning col-md-3 d-inline-block">残りわずか</div>
                                    </td>
                                    @endif
                                    <td class="align-middle col-1">
                                        <div class="form-check col-3">
                                            <input class="form-check-input position-static" type="checkbox" name="cheked_item[]" value= {{$item->id}} >
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @endforeach
                <div class="border-top pt-4 mt-4 text-center">
                    <button type="submit" name="store" value="submit" class="orange-btn">チェックを反映する</button>
                </div>
            </form>
        {{-- 買い出し・残りわずかがないとき「買い出しはありません」と表示 --}}
        @else
            <div class="center jumbotron">
                <div class="text-center">
                    <h3>買い出しはありません</h3>
                </div>
            </div>
        @endif
    </div>
@endsection