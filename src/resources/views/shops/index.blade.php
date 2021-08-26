@extends('layouts.app')

@section('content')

    <div class="page-title">
        <h2>買い出し先一覧</h2>
    </div>

    {{-- 買い出し先一覧を表示する --}}
    @if (count($shops)>0)
        {{-- 買い出し先追加ボタン --}}
        <div class="text-center">
            <a href="/shops/create" class="mb-3 orange-btn">買い出し先追加</a>
        </div>
        <div>
            {!! Form::open(['method'=>'get','route'=>['shops.index']]) !!}
                {!! Form::label('shops_sort', '並び替え',['class' => '']) !!}
                {{
                    Form::select(
                        'shops_sort',
                        ['default' =>'デフォルト', 'name_asc' => '名前 ：昇順', 'name_desc' => '名前 ：降順'],
                        $select,
                        ['class' => '', 'onchange' => 'submit(this.form)']
                    )
                }}
            {!! Form::close() !!}
        </div>
        <table class="table">
            <tbody>
                @foreach ($shops as $shop)
                    <tr>
                        {{-- 買い出し先名を押すと編集ページへ飛ぶ --}}
                        <td class="align-middle edit-link">{!! link_to_route('shops.edit', $shop->name, ['shop' => $shop->id]) !!}</td>
                        @if(empty($shop->gmap_url))
                            <td class="small align-bottom">GoogleMapは未登録です</td>
                        @else
                            <td class="small align-bottom">{!! link_to_route('gmap', 'GoogleMapを表示', ['id' => $shop->id]) !!}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h3>さっそく買い出し先を登録してみましょう！</h3>
                <p>(例) スーパーA、薬局</p>
                {{-- 買い出し先登録ページへのリンク --}}
                {!! link_to_route('shops.create', '買い出し先を新規作成', [], ['class' => 'orange-btn btn-lg']) !!}
            </div>
        </div>
    @endif
@endsection