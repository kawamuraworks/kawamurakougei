<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Description" content="外壁塗装、室内壁塗り、珪藻土、漆喰、店舗のリフォームはプロの壁屋さん兵庫・神戸の河村工芸工芸へ。">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="public\css\kawamurakougei.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <header class="navbar navbar-dark bg-dark flex-md-nowrap p-2 shadow d-lg-none">
        <a class="navbar-brand col-sm-3  me-0 px-sm-3 py-sm-3" href="#">河村工芸</a>
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
                class="navbar navbar-light col-lg-2 d-lg-block bg-light flex-column align-items-stretch p-3">

                <!-- ロゴ配置　開始 -->
                <div class="container d-none d-lg-block">
                    <div class="row justify-content-center k-pt">
                        <div class="col-12 k-logo-pd">
                            <h1><a class="navbar-brand" href="./index.html"><img src="./common/images/btn_gNav-00.png"
                                        class="img-fluid" alt=""></a></h1>
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
                                    <a class="nav-link k-nav-link" aria-current="page" href="index.html#item-1"><img
                                            src="public\images\btn_gNav01_off.png" class="img-fluid" alt="実績紹介"
                                            onmouseover="this.src='public\images\btn_gNav01_on.png'"
                                            onmouseout="this.src='public\images\btn_gNav01_off.png'"></a>
                                </div>

                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page" href="./works.html"><img
                                            src="./common/images/btn_gNav02_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='./common/images/btn_gNav02_on.png'"
                                            onmouseout="this.src='./common/images/btn_gNav02_off.png'"></a>
                                </div>


                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page" href="index.html#item-3"><img
                                            src="./common/images/btn_gNav03_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='./common/images/btn_gNav03_on.png'"
                                            onmouseout="this.src='./common/images/btn_gNav03_off.png'"></a>
                                </div>

                                <div div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page" href="index.html#item-4"><img
                                            src="./common/images/btn_gNav04_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='./common/images/btn_gNav04_on.png'"
                                            onmouseout="this.src='./common/images/btn_gNav04_off.png'"></a>
                                </div>

                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page" href="index.html#item-5"><img
                                            src="./common/images/btn_gNav05_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='./common/images/btn_gNav05_on.png'"
                                            onmouseout="this.src='./common/images/btn_gNav05_off.png'"></a>
                                </div>

                                <div
                                    class="col-sm-4 col-lg-6 themed-grid-col px-md-5 py-md-2 px-lg-2 py-lg-3 md-sm-2 pt-lg-2">
                                    <a class="nav-link k-nav-link" aria-current="page" href="#"><img
                                            src="./common/images/btn_gNav06_off.png" class="img-fluid" alt=""
                                            onmouseover="this.src='./common/images/btn_gNav06_on.png'"
                                            onmouseout="this.src='./common/images/btn_gNav06_off.png'"></a>
                                </div>
                            </div>
                        </nav>

                    </div>

                    <div class="col-lg-2 d-none d-lg-block k-pt k-gNav-sales"><img src="./common/images/gNav-sales.png"
                            class="img-fluid" alt=""></div>
                    <!-- セールス(縦書き)画像配置 -->
                </div>
                <!-- ナビボタン配置　終了 -->
            </nav>
            <!-- グローバルナビ配置　終了 -->


            <div class="min-h-screen bg-gray-100">
                @include('layouts.navigation')

                <!-- Page Heading -->
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

</html>
