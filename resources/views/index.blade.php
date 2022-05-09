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
                <a href="{{ route('work.index') }}"><img src="{{ asset('images/top1.png') }}" class="d-block w-100" alt="実績紹介"></a>
            </div>
            <div class="carousel-item">
                <a href="#item-1"><img src="{{ asset('images/top2.png') }}" class="d-block w-100" alt="会社案内"></a>
            </div>
            <div class="carousel-item">
                <a href="#item-4"><img src="{{ asset('images/top3.png') }}" class="d-block w-100" alt="工事価格"></a>
            </div>
        </div>
    </div>
    <!-- スライドショーの表示　終了 -->


    <div id="item-1" class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 10%;">
        <h1 class="cs_request pb-lg-4">神戸の左官屋として創業〇〇年</h1>
        <p class="lead">河村工芸は、先代の河村孝から数えて〇〇年の歴史があります。</p>
    </div>

    <hr style="margin: 10% 0;">

    <div id="item-3" class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 10%;">
        <h2 class="cs_request pb-lg-4">壁であればなんでも対応いたします！</h2>
        <p class="lead">
            昔ながらのブロック塀の施工・修理から外壁のひび割れや塗装の剥がれ落ち、色落ちなどの修理やリフォーム。
            さらには内壁の珪藻土リフォームや漆喰リフォームまで壁のすべてを知り尽くしたプロの左官屋にお任せください。
        </p>
    </div>

    <hr style="margin: 10% 0;">

    <div id="item-4" class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 10%;">
        <h3 class="cs_request pb-lg-4">左官工事価格のご案内</h3>
        <p class="lead">
            個人様向け<br>
            <br>
            専門技術工（左官職人）<br>
            <br>
            ※土日・祝祭日・深夜・夜間工事は労働基準法に基づいた計算式で算出しています。<br>
            <br>
            ※近遠距離や季節の状況、祝祭日の出勤等により、単価は変動いたします。<br>
            &emsp;施工時期の打ち合わせ後、改めて見積をご提出します。<br>
            <br>
            ※対応エリアにより別途交通費・駐車場代をご請求させて頂く事もあります。<br>
            <br>
            先ずは、お気軽にご相談ください！<br>
        </p>
    </div>

    <hr style="margin: 10% 0;">

    <div id="item-5" class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5 pb-4" style="margin-top: 10%;">
        <h4 class="cs_request pb-lg-4">所在地</h4>
        <p class="lead">
            河村工芸では、西は兵庫県姫路市から東は奈良県までご依頼頂いた実績があります。<br>
            距離が気になる場合でも先ずはお問い合わせください。<br>
            <span class="alert-danger">※事務所移転に伴い、Google マップの情報に変更があります。（現在変更申請中）</span>
        </p>
        <table class="mb-5">
            <tr>
                <th>会社名</th>
                <td>河村工芸</td>
            </tr>
            <tr>
                <th>所在地</th>
                <td>〒650-0011&emsp; 兵庫県神戸市中央区下山手通9丁目10-5-101</td>
            </tr>
            <tr>
                <th>最寄駅</th>
                <td>神戸市営地下鉄&ensp;大倉山駅より徒歩5分</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>078-382-0367</td>
            </tr>
            <tr>
                <th>営業時間</th>
                <td>9時&ensp;～&ensp;18時（日曜定休）</td>
            </tr>

        </table>
        <iframe
        src="https://www.google.com/maps?output=embed&z=17&ll=34.685643,135.17463&q=河村工芸"
        style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</x-app-layout>
