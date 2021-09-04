<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid front-header">
      <div class="top-header">
        <a class="navbar-brand front-logo" href="#">
            <span>TRUCKER JAPAN</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
            <a class="nav-link dropdown-toggle arrow-none custom-menu" href="{{ route('home') }}" role="button">
                <span>トップ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle arrow-none custom-menu" href="{{ route('sale') }}" role="button">
                <span>中古車販売</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle arrow-none custom-menu" href="#" role="button">
                <span>リース</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle arrow-none custom-menu" href="{{ route('bulletinBoard') }}" role="button">
                <span>掲示板</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle arrow-none custom-menu" href="#" role="button">
                <span>購入の流れ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle arrow-none custom-menu" href="#" role="button">
                <span>リースの流れ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle arrow-none custom-menu" href="#" role="button">
                <span>よくある質問</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle arrow-none custom-menu" href="#" role="button">
                <span>店舗</span>
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
    <div class="navbar header-bottom">
        <div class="header-logo">
            <a href="{{ route('home') }}">
                <div class="logo-name text-info">
                    <span class="logo-1">trucker</span>
                    <span class="logo-2">japan</span>
                </div>
                <p class="text-info">中古トラック情報はトラッカージャパン</p>
            </a>
        </div>
        <div class="header-info">
            <img src="{{asset('/images/frontend/icon-freedial.svg')}}" width="50" alt="">
            <div class="tel-number">
                <a href="tel:0120984165" data-nsfw-filter-status="swf">0120-984-165</a>
                <p>受付間：9時~18時(土日祝除く)</p>
            </div>
            <a href="{{ route('root') }}" type="button" class="btn btn-warning custome-btn-bg"><i class="fas fa-user"></i>ログイン</a>
        </div>
    </div>
</div>