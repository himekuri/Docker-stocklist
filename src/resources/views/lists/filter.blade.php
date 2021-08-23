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
        <div class = "text-center mb-3">
            <button type="button" class="btn btn-danger mb-1" disabled>買い出しのみ</button>
            {!! link_to_route('lists.index', '残りわずかも含む', [], ['class' => 'btn btn-warning mb-1']) !!}
        </div>

        {{-- 買い出しがあるとき買い出し先ごとに一覧で表示する --}}
        @if (count($items)>0)
            <form method="post" action="{{ route('lists.update') }}">
                @csrf
                @method('put')
                @foreach ($shops as $shop)
                    {{-- 買い出し先の名前を表示する --}}
                    <div class="category-shop-title pl-2">{{$shop->name}}</div>
                    <table class="table">
                        <tbody>
                            @foreach($shop->items->whereIn('status',[2]) as $item)
                                <tr>
                                    <td class="col-1"><img src="{{ $item->image_url }}" alt="画像" width="50" height="50"></td>
                                    <td class="align-middle">
                                        <div class="col-md-8  d-inline-block">{{$item->name}}</div>
                                        <div class="text-danger col-md-3  d-inline-block">買い出し</div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="form-check col-3">
                                            <input class="form-check-input position-static" type="checkbox" name="cheked_item[]" value= {{$item->id}} >
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
                <div class="border-top pt-4 mt-4 text-center">
                        <button type="submit" name="store" value="submit" class="orange-btn">チェックを反映する</button>
                </div>
            </form>
        {{-- 買い出しがないとき「買い出しはありません」と表示 --}}
        @else
            <div class="center jumbotron">
                <div class="text-center">
                    <h3>買い出しはありません</h3>
                </div>
            </div>
        @endif
    </div>
@endsection