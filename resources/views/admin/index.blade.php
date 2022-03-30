<x-app-layout>
    <img src="{{ asset($image[0]->path . '/works_1_0.jpg') }}" class="card-img" alt="{{ $detail[0]->headline }}">
    <div class="card-img-overlay">
        <h1 class="headline">{{ $detail[0]->headline }}</h1>
        <p class="period">施工期間：{{ $detail[0]->period }}</p>
        <div class="scrolldown1"><span>Scroll Down</span></div>
    </div>

    <div class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 10%;">
        <h2 class="cs_request pb-lg-4">{{ $detail[0]->cs_request }}</h2>
        <p class="lead">{{ $detail[0]->lead }}</p>
    </div>

    <div class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 5%;">
        <table>
            <tr>
                <th>所　在　地</th>
                <td>{{ $detail[0]->location }}</td>
            </tr>

            <tr>
                <th>用　　　途</th>
                <td>{{ $detail[0]->type1 }} @if (isset($detail[0]->type2))
                        / {{ $detail[0]->type2 }}
                        @endif @if (isset($detail[0]->type3))
                            / {{ $detail[0]->type3 }}
                        @endif
                </td>
            </tr>
            <tr>

                <th>工 事 内 容</th>
                <td>{{ $detail[0]->content_tag1 }} @if (isset($detail[0]->content_tag2))
                        / {{ $detail[0]->content_tag2 }}
                        @endif @if (isset($detail[0]->content_tag3))
                            / {{ $detail[0]->content_tag3 }}
                        @endif
                </td>
            </tr>
        </table>
    </div>

    <!-- スライドショー -->
    <div class="card col-sm-2 col-lg-10 bg-light k-card-slide" style="margin-top: 10%; align-items: center;">
        <div id="carouselExampleFade" class="carousel  carousel-dark slide carousel-fade pt-5" data-bs-ride="carousel">

            <!-- ページ切り替えバー -->

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active"
                    aria-label="スライド 1" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="スライド 2"
                    class=""></button>
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="スライド 3"
                    class=""></button>
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="3" aria-label="スライド 4"
                    class=""></button>
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="4" aria-label="スライド 5"
                    class=""></button>
            </div>



            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active"
                    aria-label="スライド 1" aria-current="true"></button>
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="スライド 2"
                    class=""></button>
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="スライド 3"
                    class=""></button>
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="3" aria-label="スライド 4"
                    class=""></button>
                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="4" aria-label="スライド 5"
                    class=""></button>
            </div>

            <!-- スライドショーに表示されるコンテンツ -->
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="./common/works/works-0001-1.jpg" alt="第1スライド" class="d-block"
                        width="calc(100% * 0.9)" height="auto" style="margin: 0 auto;">
                    <div class="carousel-caption d-block k-carousel-caption">
                        <p class="k-detail-content">1番目のスライドの代表的なプレースホルダコンテンツ。</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="5000">
                    <img src="./common/works/works-0001-2.jpg" alt="第2スライド" class="d-block"
                        width="calc(100% * 0.9)" height="auto" style="margin: 0 auto;">
                    <div class="carousel-caption d-block k-carousel-caption">
                        <p class="k-detail-content">2番目のスライドの代表的なプレースホルダコンテンツ。</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="5000">
                    <img src="./common/works/works-0001-3.jpg" alt="第2スライド" class="d-block"
                        width="calc(100% * 0.9)" height="auto" style="margin: 0 auto;">
                    <div class="carousel-caption d-block k-carousel-caption">
                        <p class="k-detail-content">3番目のスライドの代表的なプレースホルダコンテンツ。</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="5000">
                    <img src="./common/works/works-0001-4.jpg" alt="第4スライド" class="d-block"
                        width="calc(100% * 0.9)" height="auto" style="margin: 0 auto;">
                    <div class="carousel-caption d-block k-carousel-caption">
                        <p class="k-detail-content">4番目のスライドの代表的なプレースホルダコンテンツ。</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="5000">
                    <img src="./common/works/works-0001-5.jpg" alt="第5スライド" class="d-block"
                        width="calc(100% * 0.9)" height="auto" style="margin: 0 auto;">
                    <div class="carousel-caption d-block k-carousel-caption">
                        <p class="k-detail-content">5番目のスライドの代表的なプレースホルダコンテンツ。</p>
                    </div>
                </div>
            </div>
            <!-- ↑スライドショーに表示されるコンテンツここまで -->
        </div>
    </div>
    <!-- ↑スライドショーここまで -->
    <div class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 5%;">
        <h3 class="k-detail-headline pb-lg-2">実績一覧</h3>
    </div>

    <div class="row row-cols-2 row-cols-lg-4 mx-2 px-2 mx-md-4 px-md-3 pb-5">

        <div class="col-sm-6 col-lg-3 themed-grid-col md-sm-2 pt-lg-2">
            <figure class="works-list">
                <a class="nav-link k-nav-link" aria-current="page" href="#">
                    <img src="./common/works/works-0001-1.jpg" class="img-fluid" alt="">
                </a>
                <figcaption class="k-detail-content">ヨーロピアン風の外壁施工</figcaption>
            </figure>
        </div>

        <div class="col-sm-6 col-lg-3 themed-grid-col md-sm-2 pt-lg-2">
            <figure class="works-list">
                <a class="nav-link k-nav-link" aria-current="page" href="#">
                    <img src="./common/works/works-0002-1.jpg" class="img-fluid" alt="">
                </a>
                <figcaption class="k-detail-content">ヨーロピアン風の外壁施工</figcaption>
            </figure>
        </div>

        <div class="col-sm-6 col-lg-3 themed-grid-col md-sm-2 pt-lg-2">
            <figure class="works-list">
                <a class="nav-link k-nav-link" aria-current="page" href="#">
                    <img src="./common/works/works-0003-1.jpg" class="img-fluid" alt="">
                </a>
                <figcaption class="k-detail-content">ヨーロピアン風の外壁施工</figcaption>
            </figure>
        </div>

        <div class="col-sm-6 col-lg-3 themed-grid-col md-sm-2 pt-lg-2">
            <figure class="works-list">
                <a class="nav-link k-nav-link" aria-current="page" href="#">
                    <img src="./common/works/works-0004-1.jpg" class="img-fluid" alt="">
                </a>
                <figcaption class="k-detail-content">ヨーロピアン風の外壁施工</figcaption>
            </figure>
        </div>

        <div class="col-sm-6 col-lg-3 themed-grid-col md-sm-2 pt-lg-2">
            <figure class="works-list">
                <a class="nav-link k-nav-link" aria-current="page" href="#">
                    <img src="./common/works/works-0005-1.jpg" class="img-fluid" alt="">
                </a>
                <figcaption class="k-detail-content">ヨーロピアン風の外壁施工</figcaption>
            </figure>
        </div>

        <div class="col-sm-6 col-lg-3 themed-grid-col md-sm-2 pt-lg-2">
            <figure class="works-list">
                <a class="nav-link k-nav-link" aria-current="page" href="#">
                    <img src="./common/works/works-0006-1.jpg" class="img-fluid" alt="">
                </a>
                <figcaption class="k-detail-content">ヨーロピアン風の外壁施工</figcaption>
            </figure>
        </div>

        <div class="col-sm-6 col-lg-3 themed-grid-col md-sm-2 pt-lg-2">
            <figure class="works-list">
                <a class="nav-link k-nav-link" aria-current="page" href="#">
                    <img src="./common/works/works-0007-1.jpg" class="img-fluid" alt="">
                </a>
                <figcaption class="k-detail-content">ヨーロピアン風の外壁施工</figcaption>
            </figure>
        </div>

        <div class="col-sm-6 col-lg-3 themed-grid-col md-sm-2 pt-lg-2">
            <figure class="works-list">
                <a class="nav-link k-nav-link" aria-current="page" href="#">
                    <img src="./common/works/works-0008-1.jpg" class="img-fluid" alt="">
                </a>
                <figcaption class="k-detail-content">ヨーロピアン風の外壁施工</figcaption>
            </figure>
        </div>

    </div>


</x-app-layout>
