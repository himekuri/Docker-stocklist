@extends('layouts.app')
@section('content')
    {{-- タブ切り替え --}}
    <nav class="bl_mainTab">
        <a class="bl_mainTab_item" href="/">在庫確認</a>
        <a class="bl_mainTab_item active" href="/lists">買い出しリスト</a>
    </nav>
    <div class="bl_main">
        <div class="hp_textCenter hp_mb">
            {{-- LINEで送るボタン --}}
            <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url= {{ route('users.autoLogin', ['token' => \Auth::user()->secret_token]) }} data-color="default" data-size="large" data-count="false" style="display: none;"></div>
        </div>

        {{-- 表示の絞り込み機能 --}}
        <div class = "bl_filter hp_mb">
            <button type="button" class="bl_filter_item el_btn" disabled>　買い出しのみ　</button>
            <button type="button" class="bl_filter_item el_btn" onclick="location.href='./'">残りわずかも含む</button>
        </div>

        {{-- 買い出しがあるとき買い出し先ごとに一覧で表示する --}}
        @if (count($items)>0)
            <div class="hp_textRight hp_mb">
                {!! Form::open(['method'=>'get','route'=>['lists.filter']]) !!}
                    {!! Form::label('shops_sort', '並び替え',['class' => 'el_sortLabel']) !!}
                    <div class="bl_selectWrap">
                        {{
                            Form::select(
                                'shops_sort',
                                ['default' =>'デフォルト', 'name_asc' => '名前 ：昇順', 'name_desc' => '名前 ：降順'],
                                $select,
                                ['class' => 'el_btn el_btnOutlineBlack', 'onchange' => 'submit(this.form)']
                            )
                        }}
                    </div>
                {!! Form::close() !!}
            </div>
            <form method="post" action="{{ route('lists.update') }}">
                @csrf
                @method('put')
                @foreach ($shops as $shop)
                @if (count($shop->items->whereIn('status',[2])) >= 1)
                    {{-- 買い出し先の名前を表示する --}}
                    <div class="bl_CategoryTitle">{{$shop->name}}</div>
                    <table class="bl_table">
                        <tbody>
                            @foreach($shop->items->whereIn('status',[2]) as $item)
                                <tr>
                                    <td class="el_itemImg"><img src="{{ $item->image_url }}" alt="画像" width="50" height="50"></td>
                                    <td>
                                        <div>{{$item->name}}</div>
                                        <div class="hp_colorRed">買い出し</div>
                                    </td>
                                    <td class="hp_textRight">
                                        <div class="bl_checkBox">
                                            <input type="checkbox" name="cheked_item[]" value= {{$item->id}} >
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                 @endif
                @endforeach
                <div class="hp_textCenter hp_borderTop hp_pt4">
                        <button type="submit" name="store" value="submit" class="el_btn el_btnOrange">チェックを反映する</button>
                </div>
            </form>
        {{-- 買い出しがないとき「買い出しはありません」と表示 --}}
        @else
            <div class="hp_textCenter hp_mt4 hp_mb">
                    <h3>買い出しはありません</h3>
            </div>
        @endif
    </div>
@endsection