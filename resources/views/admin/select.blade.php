<x-app-layout>


    <div class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 5%;">
        <h3 class="cs_request pb-lg-2">内容変更する実績を選択</h3>
    </div>
    <x-message :message="session('message')" />

    <div class="row row-cols-2 row-cols-lg-4 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5 pb-5" padding-left:0>
        @foreach ($detail as $k => $v)
            <div class="col-sm-6 col-lg-3 themed-grid-col pt-lg-2 ps-0">
                <figure class="works-list">
                    <a class="nav-link k-nav-link" aria-current="page" href="{{route('admin.edit', $detail[$k])}}">
                        <img src="{{ asset('storage/work_' . $detail[$k]->id . '/works_' . $detail[$k]->id . '_0.jpg') }}"
                            class="img-fluid" alt="">
                    </a>
                    <figcaption class="lead">{{ $detail[$k]->headline }}</figcaption>
                    @if($detail[$k]->is_detail_deleted == 1)
                        <span class="alert-danger">非表示</span>
                    @endif
                    {{$detail[$k]->priority}}
                </figure>
            </div>
        @endforeach
    </div>


</x-app-layout>
