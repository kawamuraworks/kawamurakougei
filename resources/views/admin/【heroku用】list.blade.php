<x-app-layout>


    <div class="col-sm-10 col-lg-8 ps-5" style="margin-top: 5%;">
        <h3 class="cs_request pb-lg-2">管理画面一覧</h3>
    </div>
    <x-message :message="session('message')" />

    <div class="row col-md-12 ps-5 justify-content-center">
        <a class="col-md-8 btn btn-outline-primary btn-lg mt-5" href="{{ url('/admin/create') }}">新規実績登録画面</a>
        <a class="col-md-8 btn btn-outline-primary btn-lg my-4" href="{{ url('/admin/select') }}">実績変更選択画面</a>
        <a class="col-md-8 btn btn-outline-primary btn-lg mb-5" href="{{ route('register') }}">管理者登録画面</a>
    </div>


</x-app-layout>
