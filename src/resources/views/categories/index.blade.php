@extends('layouts.app')

@section('content')
    <div class="bl_pageTitle">
        <h2>カテゴリー一覧</h2>
    </div>
    {{-- カテゴリー一覧を表示する --}}
     @if (count($categories)>0)
    {{-- カテゴリー追加ボタン --}}
    <div class="hp_textCenter">
        <a href="/categories/create" class="hp_mb el_btn el_btnOrange">カテゴリー追加</a>
    </div>
    <table class="bl_table">
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    {{-- カテゴリー名を押すと編集ページへ飛ぶ --}}
                    <td class="el_editLink">{!! link_to_route('categories.edit', $category->name, ['category' => $category->id]) !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="hp_textCenter">
        <div class="hp_textCenter">
            <p><img class="bl_firstGuideImg" src="img/category-guide.png" alt="さっそくカテゴリーを登録してみましょう！"></p>
            {{-- 登録ページへのリンク --}}
            {!! link_to_route('categories.create', 'カテゴリーを新規登録', [], ['class' => 'hp_mb el_btn el_btnOrange']) !!}
        </div>
    </div>
    @endif
@endsection