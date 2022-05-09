<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Description" content="外壁塗装、室内壁塗り、珪藻土、漆喰、店舗のリフォームはプロの壁屋さん兵庫・神戸の河村工芸へ。">

    <title>{{ config('app.name', '河村工芸') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/kawamurakougei.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <header class="navbar navbar-dark bg-dark flex-md-nowrap p-2 shadow d-lg-none">
        <a class="navbar-brand col-sm-3 me-0 px-sm-3 py-sm-3" href="/">河村工芸</a>
        <button class="navbar-toggler position-right d-lg-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- グローバルナビ　開始 -->
            <nav id="sidebarMenu"
                class="collapse navbar navbar-light col-lg-2 d-lg-block bg-light flex-column align-items-stretch p-3">

                <!-- ロゴ配置　開始 -->
                <div class="container d-none d-lg-block">
                    <div class="row justify-content-center k-pt">
                        <div class="col-12 k-logo-pd">
                            <a class="navbar-brand" href="/"><img src="/images/btn_gNav-00.png"
                                        class="img-fluid" alt="リフォームはプロの壁屋さん兵庫・神戸の河村工芸へ"></a>
                        </div>
                    </div>
                </div>
                <!-- ロゴ配置　終了 -->

                <!-- ナビボタン配置　開始 -->
                <div class="row g-0">
                    <div class="col-sm-12 col-lg-10">
                        <!-- PC表示 -->
                        <nav class="nav nav-pills d-block flex-column">
                            <div class="row row-cols-3 row-cols-sm-4 row-cols-lg-2 pt-lg-5">
                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page"
                                        @if (Route::getCurrentRoute()->getName() === 'index') href="#item-1" @else href="{{ route('index') }}" @endif><img
                                            src="/images/btn_gNav01_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='/images/btn_gNav01_on.png'"
                                            onmouseout="this.src='/images/btn_gNav01_off.png'"></a>
                                </div>

                                <!-- 実績ページは常にナビボタンをonにする。画像の切り替えは必要ない。 -->
                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page"
                                        href="{{ route('work.index') }}"><img
                                            @if (Route::getCurrentRoute()->getName() === 'work.index') src="/images/btn_gNav02_on.png" @else src="/images/btn_gNav02_off.png"
                                        onmouseover="this.src='/images/btn_gNav02_on.png'"
                                        onmouseout="this.src='/images/btn_gNav02_off.png'" @endif
                                            class="img-fluid" alt=""></a>
                                </div>


                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page"
                                        @if (Route::getCurrentRoute()->getName() === 'index') href="#item-3" @else href="{{ route('index') }}" @endif><img
                                            src="/images/btn_gNav03_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='/images/btn_gNav03_on.png'"
                                            onmouseout="this.src='/images/btn_gNav03_off.png'"></a>
                                </div>

                                <div div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page"
                                        @if (Route::getCurrentRoute()->getName() === 'index') href="#item-4" @else href="{{ route('index') }}" @endif><img
                                            src="/images/btn_gNav04_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='/images/btn_gNav04_on.png'"
                                            onmouseout="this.src='/images/btn_gNav04_off.png'"></a>
                                </div>

                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page"
                                        @if (Route::getCurrentRoute()->getName() === 'index') href="#item-5" @else href="{{ route('index') }}" @endif><img
                                            src="/images/btn_gNav05_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='/images/btn_gNav05_on.png'"
                                            onmouseout="this.src='/images/btn_gNav05_off.png'"></a>
                                </div>

                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page"
                                        href="{{ route('contact') }}"><img
                                            @if (Route::getCurrentRoute()->getName() === 'contact') src="/images/btn_gNav06_on.png" @else src="/images/btn_gNav06_off.png"
                                        onmouseover="this.src='/images/btn_gNav06_on.png'"
                                        onmouseout="this.src='/images/btn_gNav06_off.png'" @endif
                                            class="img-fluid" alt=""></a>
                                </div>

                                @if (Route::has('login'))
                                    <div
                                        class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                        @auth
                                            <a class="nav-link k-nav-link" aria-current="page"
                                                href="{{ route('admin.list') }}"><img
                                                    @if (strpos(Route::getCurrentRoute()->getName(), 'admin.') === false) src="/images/btn_gNav07_off.png" onmouseover="this.src='/images/btn_gNav07_on.png'"
                                                    onmouseout="this.src='/images/btn_gNav07_off.png'" @else src="/images/btn_gNav07_on.png" @endif
                                                    class="img-fluid" alt=""></a>
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </nav>
                    </div>

                    <div class="col-lg-2 d-none d-lg-block k-pt k-gNav-sales"><img src="/images/gNav-sales.png"
                            class="img-fluid" alt=""></div>
                    <!-- セールス(縦書き)画像配置 -->
                </div>
                <!-- ナビボタン配置　終了 -->
            </nav>
            <!-- グローバルナビ配置　終了 -->

            <main class="col-lg-10 col-sm-12 k-side-pd">
                <div data-bs-spy="scroll" data-bs-target="#sidebarMenu" data-bs-offset="0" class="scrollspy"
                    tabindex="0">
                    {{ $slot }}

                    <div class="row col-md-12 px-lg-5 px-sm-3" style="margin-left: 0; margin-right: 0">
                        <p id="k-copyright" style="margin-bottom: 0; text-align: right;">©2022 kawamura Kougei All
                            Rights Reserved</p>
                        <hr style="margin-bottom: 0">

                        @if (Route::has('login'))
                            <div class="row col-md-12 mb-lg-2 mb-sm-5 ps-0">
                                @auth
                                    <form method="post" action="{{ route('logout') }}" class="col-sm-12 col-lg-2 my-2">
                                        @csrf
                                        <button class="btn btn-light my-2">ログアウト</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="col-lg-2 col-sm-4 btn btn-light ms-2 my-2">ログイン</a>

                                    <a class="col-lg-2 col-sm-4 btn btn-light ms-2 my-2" href="{{ route('register') }}">管理者登録画面</a>
                                @endauth
                            </div>
                        @endif

                    </div>
                    <div class="d-lg-none col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5 pb-4" style="margin-top: 100%;"></div>
                </div>
            </main>
        </div>
    </div>


    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/kawamurakougei.js.js') }}"></script>
</body>

</html>
