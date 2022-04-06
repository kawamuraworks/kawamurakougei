<x-app-layout>

    <div class="col-sm-10 col-lg-8 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5" style="margin-top: 5%;">
        <h3 class="cs_request pb-lg-2">内容変更する実績を選択</h3>
    </div>

    <div class="row row-cols-2 row-cols-lg-4 px-sm-4 mx-sm-4 px-lg-5 mx-lg-5 pb-5" padding-left:0>
        @foreach ($lists as $k => $v)
            <div class="col-sm-6 col-lg-3 themed-grid-col pt-lg-2 ps-0">
                <figure class="works-list">
                    <a class="nav-link k-nav-link" aria-current="page" href="/work/index?priority={{ $lists[$k]->id }}">
                        <img src="{{ asset('storage/work_' . $lists[$k]->id . '/works_' . $lists[$k]->id . '_0.jpg') }}"
                            class="img-fluid" alt="">
                    </a>
                    <figcaption class="lead">{{ $lists[$k]->headline }}</figcaption>
                </figure>
            </div>
        @endforeach
    </div>


</x-app-layout>
