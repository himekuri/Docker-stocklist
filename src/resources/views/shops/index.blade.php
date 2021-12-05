@extends('layouts.app')

@section('content')

    <div class="bl_pageTitle">
        <h2>買い出し先一覧</h2>
    </div>

    {{-- 買い出し先一覧を表示する --}}
    @if (count($shops)>0)
    {{-- 買い出し先追加ボタン --}}
    <div class="hp_textCenter">
        <a href="/shops/create" class="hp_mb el_btn el_btnOrange">買い出し先追加</a>
    </div>
    <div class="hp_textRight hp_mb">
        {!! Form::open(['method'=>'get','route'=>['shops.index']]) !!}
            {!! Form::label('shops_sort', '並び替え',['class' => 'el_sortLabel']) !!}
            {{
                Form::select(
                    'shops_sort',
                    ['default' =>'デフォルト', 'name_asc' => '名前 ：昇順', 'name_desc' => '名前 ：降順'],
                    $select,
                    ['class' => 'el_btn el_btnOutlineBlack', 'onchange' => 'submit(this.form)']
                )
            }}
        {!! Form::close() !!}
    </div>
    <table class="bl_table">
        <tbody>
            @foreach ($shops as $shop)
                <tr>
                    {{-- 買い出し先名を押すと編集ページへ飛ぶ --}}
                    <td class="el_editLink">{!! link_to_route('shops.edit', $shop->name, ['shop' => $shop->id]) !!}</td>
                    @if(empty($shop->gmap_url))
                        <td>GoogleMapは未登録です</td>
                    @else
                        <td class="el_editLink">{!! link_to_route('gmap', 'GoogleMapを表示', ['id' => $shop->id]) !!}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="hp_textCenter">
        <div class="hp_textCenter">
            <p><img class="bl_firstGuideImg" src="img/shop-guide.png" alt="さっそく買い出し先を登録してみましょう！"></p>
            {{-- 登録ページへのリンク --}}
            {!! link_to_route('shops.create', '買い出し先を新規登録', [], ['class' => 'hp_mb el_btn el_btnOrange']) !!}
        </div>
    </div>
    @endif
@endsection