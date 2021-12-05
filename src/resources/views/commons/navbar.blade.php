<header>
    <div class="ly_header_inner">
        {{-- トップページへのリンク --}}
        <a class="bl_headerLogo" href="/">Stocklist</a>

        <div class="bl_headerToggler" id="headerToggler"><i class="fas fa-bars"></i></div>

        <!-- メニュー項目 -->
        @if (Auth::check())
            <ul class="bl_navbar_nav hp_mrAuto" id="navbar_nav">
                <li class="bl_navbar_item {{ request()->route()->named('items.index','top') ? 'active' : '' }}">{!! link_to_route('items.index', '在庫確認', [], ['class' => 'bl_navbar_link']) !!}</li>
                <li class="bl_navbar_item {{ request()->route()->named('categories.index') ? 'active' : '' }}">{!! link_to_route('categories.index', 'カテゴリー', [], ['class' => 'bl_navbar_link']) !!}</li>
                <li class="bl_navbar_item {{ request()->route()->named('shops.index') ? 'active' : '' }}">{!! link_to_route('shops.index', '買い出し先', [], ['class' => 'bl_navbar_link']) !!}</li>
            </ul>
            <ul class="bl_navbar_nav hp_mlAuto" id="navbar_nav_logout">
                <li class="bl_navbar_item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'bl_navbar_link']) !!}</li>
            </ul>
        @else
            <ul class="bl_navbar_nav hp_mlAuto" id="navbar_nav">
                {{-- アカウント登録ページへのリンク --}}
                <li class="bl_navbar_item {{ request()->route()->named('signup.get') ? 'active' : '' }}">{!! link_to_route('signup.get', 'アカウント登録', [], ['class' => 'bl_navbar_link']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li class="bl_navbar_item {{ request()->route()->named('login') ? 'active' : '' }}">{!! link_to_route('login', 'ログイン', [], ['class' => 'bl_navbar_link']) !!}</li>
            </ul>
        @endif

    </div>
    {{-- /.ly_header_inner --}}
</header>