@extends('layouts.app')

@section('content')
    <div class="page-title">
        <h2>カテゴリー一覧</h2>
    </div>
    {{-- カテゴリー一覧を表示する --}}
     @if (count($categories)>0)
        {{-- カテゴリー追加ボタン --}}
        <div class="text-center">
            <a href="/categories/create" class="mb-3 orange-btn">カテゴリー追加</a>
        </div>
        <table class="table">
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        {{-- カテゴリー名を押すと編集ページへ飛ぶ --}}
                        <td class="align-middle">{!! link_to_route('categories.edit', $category->name, ['category' => $category->id]) !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h3>さっそくカテゴリーを登録してみましょう！</h3>
                <p>(例) 野菜、ドリンク、備品</p>
                {{-- カテゴリー登録ページへのリンク --}}
                {!! link_to_route('categories.create', 'カテゴリーを新規作成', [], ['class' => 'orange-btn btn-lg']) !!}
            </div>
        </div>
    @endif
@endsection