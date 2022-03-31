<x-app-layout>

    <!-- スライドショーの表示　開始 -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/top1.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/top2.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/top3.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <!-- スライドショーの表示　終了 -->

    <div style="margin: 20% 10% 0 10%;">
        <h4 id="item-1" style="border-bottom: 1px solid lightgray; padding-left: 10px;">会社案内</h4>
        <p>会社案内の文章です。...</p>
    </div>

    <hr id="item-3" style="margin: 50% 10%;">

    <div style="margin-left: 10%;">
        <h4>サービス</h4>
        <p>サービスの文章です。...</p>
    </div>

    <hr id="item-4" style="margin: 50% 10%;">

    <div style="margin-left: 10%;">
        <h4>工事価格</h4>
        <p>アイテム 3の文章です。...</p>
    </div>

    <hr id="item-5" style="margin: 50% 10%;">

    <div style="margin-left: 10%;">
        <h4>所在地</h4>
        <p>所在地の文章です。...</p>
    </div>

    <hr style="margin: 10%;">

</x-app-layout>
