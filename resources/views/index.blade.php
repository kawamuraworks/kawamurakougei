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
                <img src="{{ asset('images/top1.png') }}" class="d-block w-100" alt="実績紹介">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/top2.png') }}" class="d-block w-100" alt="会社案内">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/top3.png') }}" class="d-block w-100" alt="工事価格">
            </div>
        </div>
    </div>
    <!-- スライドショーの表示　終了 -->


    <div id="item-1" class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 10%;">
        <h2 class="cs_request pb-lg-4">神戸の左官屋として創業〇〇年</h2>
        <p class="lead">河村工芸は、先代の河村孝から数えて〇〇年の歴史があります。</p>
    </div>

    <hr id="item-3" style="margin: 10% 0;">

    <div class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 10%;">
        <h3 class="cs_request pb-lg-4">壁であればなんでも対応いたします！</h3>
        <p class="lead">
            昔ながらのブロック塀の施工・修理から外壁のひび割れや塗装の剥がれ落ち、色落ちなどの修理やリフォーム。
            さらには内壁の珪藻土リフォームや漆喰リフォームまで壁のすべてを知り尽くしたプロの左官屋にお任せください。
        </p>
    </div>

    <hr id="item-4" style="margin: 10% 0;">

    <div class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 10%;">
        <h4 class="cs_request pb-lg-4">工事価格のご案内</h4>
        <p class="lead">
            個人様向け<br>
            <br>
            専門技術工（左官職人）<br>
            <br>
            ※職人1日当たり目安<br>
            ￥30,000～￥40,000（税別）<br>
            <br>
            AM8時～PM5時<br>
            土日・祝祭日・深夜・夜間工事は労働基準法に基づいた計算式で算出させて頂きます。<br>
            ※近遠距離や季節の状況、祝祭日の出勤により、手配人数で単価は、施工時期の打ち合わせ後、決めさせて頂いております。<br>
            <br>
            対応エリアにより別途交通費・駐車場代をご請求させて頂く事もあります。<br>
            お気軽にご相談ください！<br>
        </p>
    </div>

    <hr id="item-5" style="margin: 10% 0;">

    <div class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 10%;">
        <h4 class="cs_request pb-lg-4">所在地</h4>
        <p class="lead">
            個人様向け<br>
            <br>
            専門技術工（左官職人）<br>
            <br>
            ※職人1日当たり目安<br>
            ￥30,000～￥40,000（税別）<br>
            <br>
            AM8時～PM5時<br>
            土日・祝祭日・深夜・夜間工事は労働基準法に基づいた計算式で算出させて頂きます。<br>
            ※近遠距離や季節の状況、祝祭日の出勤により、手配人数で単価は、施工時期の打ち合わせ後、決めさせて頂いております。<br>
            <br>
            対応エリアにより別途交通費・駐車場代をご請求させて頂く事もあります。<br>
            お気軽にご相談ください！<br>
        </p>
    </div>

</x-app-layout>
