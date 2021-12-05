@extends('layouts.app')

@section('content')
<div class="un_container">
	<!-- トップ -->
    <section class="un_top">
		<div class="un_top_title">買い出しをもっと<br>スムーズに！</div>
		<p>Stock List は店舗の在庫チェックから買い物リストの作成が簡単にできる無料サービスです。</p>
		{{-- ユーザ登録ページへのリンク --}}
		<a href="/signup" class="el_btn el_btnOrange">アカウント登録する　<i class="fas fa-chevron-right"></i></a>
	</section>
	<!-- サービスの説明 -->
	<section class="un_guide">
		<h5 class="un_guide_title">〜 Stock List で できること 〜</h5>
		<div class="un_guide_inner">
			<section class="un_guide_item">
				<p><img class="un_guide_img" src="img/category.png" width="500" height="500" alt="category"></p>
				<p>1. 食材や備品の登録</p>
				<p class="un_guide_text">「野菜」などのカテゴリーや買い出し先を設定することができます</p>
			</section>
			<section class="un_guide_item">
				<p><img class="un_guide_img" src="img/check.png" width="500" height="500" alt="check-stock"></p>
				<p>2. 在庫チェック</p>
				<p class="un_guide_text">在庫の状況を「買い出し」「残りわずか」「在庫あり」の３つから選ぶことができます</p>
			</section>
			<section class="un_guide_item">
				<p><img class="un_guide_img" src="img/check-list.png" width="500" height="500" alt="check-list"></p>
				<p>3. 買い出しリスト</p>
				<p class="un_guide_text">在庫状況や買い出し先は自動的に買い出しリストに反映されます</p>
			</section>
		</div>
		{{-- /.un_guide_inner --}}
	</section>
	<!-- 新規登録・ログインへの誘導 -->
	<section class="un_message">
		<p>さっそく店舗のアカウントを<br>作ろう！</p>
		<a href="/signup" class="el_btn el_btnOrange">アカウント登録する　<i class="fas fa-chevron-right"></i></a>
	</section>
</div>
<!-- /.un_container -->


@endsection