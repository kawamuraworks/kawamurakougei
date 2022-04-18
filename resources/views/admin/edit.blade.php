<x-app-layout>

    <h3 class="ps-5 py-3">実績変更</h3>

    <x-validation-errors class="px-5 mb-4 px-4 py-3 alert-danger rounded" :errors="$errors" />
    <x-message :message="session('message')" />

    <form method="post" action="{{ route('admin.update', $detail) }}" enctype="multipart/form-data"
        class="needs-validation" novalidate>
        @csrf
        @method('patch')

        <input type="hidden" name="id" value="{{ $detail->id }}">
        <input type="hidden" name="user_id" value="{{ $detail->user_id }}">

        <!-- 実績詳細テーブル用（左） -->
        <div class="row px-5" style="margin-right:0">
            <div class="col-md-6 pe-5 k-side-pd">
                {{-- 表示非表示・掲載順の変更 --}}
                <div class="row border border-3 border-danger pt-3 pb-4">
                    <p class="form-label fw-bold text-danger text-center">枠内に誤りがないか確認してください</p>
                    <div class="col-md-6">
                        <label for="is_detail_deleted" class="form-label">表示切替</label>
                        <select class="form-select d-block w-100" id="is_detail_deleted" name="is_detail_deleted"
                            required>
                            @foreach ($display as $k => $v)
                                @if ($k == $detail->is_detail_deleted)
                                    <option value="{{ old('is_detail_deleted', $detail->is_detail_deleted) }}"
                                        selected>
                                        {{ $v }}
                                    </option>
                                    @continue
                                @endif
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row col-md-6">
                        <label for="priority" class="form-label">表示順</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="priority" name="priority"
                                value="{{ old('priority', $detail->priority) }}">
                            <div class="invalid-feedback">
                                表示順を入力してください
                            </div>
                        </div>
                        <div class="col-sm-8 ps-0 pt-1">番目</div>
                    </div>
                </div>

                <div class="col-sm-12 pt-3">
                    <label for="headline" class="form-label">見出し</label>
                    <input type="text" class="form-control" id="headline" name="headline"
                        value="{{ old('headline', $detail->headline) }}" placeholder="12字以下推奨" required>
                    <div class="invalid-feedback">
                        見出しを入力してください
                    </div>
                </div>

                <div class="col-sm-12 pt-3">
                    <label for="period" class="form-label">施工期間</label>
                    <input type="text" class="form-control" id="period" name="period"
                        value="{{ old('period', $detail->period) }}" placeholder="〇年〇ヶ月　又は　〇週間" required>
                    <div class="invalid-feedback">
                        施工期間を入力してください
                    </div>
                </div>

                <div class="col-sm-12 pt-3">
                    <label for="cs_request" class="form-label">お客様要望</label>
                    <input type="text" class="form-control" id="cs_request" name="cs_request"
                        value="{{ old('cs_request', $detail->cs_request) }}" placeholder="15字以下推奨" required>
                    <div class="invalid-feedback">
                        お客様要望を入力してください
                    </div>
                </div>

                <div class="col-sm-12 pt-3">
                    <label for="lead" class="form-label">リード文</label>
                    <textarea rows="5" cols="60" class="form-control" id="lead" name="lead" placeholder="ここに記入してください"
                        required>{{ old('lead', $detail->lead) }}</textarea>
                    <div class="invalid-feedback">
                        リード文を入力してください
                    </div>
                </div>

                <div class="col-sm-12 pt-3">
                    <label for="location" class="form-label">所在地</label>
                    <input type="text" class="form-control" id="location" name="location"
                        value="{{ old('location', $detail->location) }}" placeholder="〇〇県△△市" required>
                    <div class="invalid-feedback">
                        所在地を入力してください
                    </div>
                </div>


                <div class="row  pt-3">
                    <div class="col-md-4">
                        <label for="type1" class="form-label">用途1</label>
                        <select class="form-select d-block w-100" id="type1" name="type1" required>
                            @foreach ($types as $k => $v)
                                @if ($k == $detail->type1)
                                    <option value="{{ old('type1', $detail->type1) }}" selected> {{ $v }}
                                    </option>
                                    @continue
                                @endif
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            用途を選択してください
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="type2" class="form-label">用途2 <span
                                class="text-muted">(該当時のみ)</span></label>
                        <select class="form-select d-block w-100" id="type2" name="type2">
                            @if (isset($detail->type2))
                                @foreach ($types as $k => $v)
                                    @if ($k == $detail->type2)
                                        <option value="{{ old('type2', $detail->type2) }}" selected>
                                            {{ $v }}
                                        </option>
                                        @continue
                                    @endif
                                    <option value={{ $k }}>{{ $v }}</option>
                                @endforeach
                            @else
                                <option value="">選択...</option>
                                @foreach ($types as $k => $v)
                                    <option value={{ $k }}>{{ $v }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="type3" class="form-label">用途3 <span
                                class="text-muted">(該当時のみ)</span></label>
                        <select class="form-select d-block w-100" id="type3" name="type3">
                            @if (isset($detail->type3))
                                @foreach ($types as $k => $v)
                                    @if ($k == $detail->type3)
                                        <option value="{{ old('type3', $detail->type3) }}" selected>
                                            {{ $v }}
                                        </option>
                                        @continue
                                    @endif
                                    <option value={{ $k }}>{{ $v }}</option>
                                @endforeach
                            @else
                                <option value="">選択...</option>
                                @foreach ($types as $k => $v)
                                    <option value={{ $k }}>{{ $v }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="row  pt-3">
                    <div class="col-md-4">
                        <label for="content_tag1" class="form-label">工事内容1</label>
                        <select class="form-select d-block w-100" id="content_tag1" name="content_tag1" required>
                            @foreach ($tags as $k => $v)
                                @if ($k == $detail->content_tag1)
                                    <option value="{{ old('content_tag1', $detail->content_tag1) }}" selected>
                                        {{ $v }}
                                    </option>
                                    @continue
                                @endif
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            工事内容を選択してください
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="content_tag2" class="form-label">工事内容2 <span
                                class="text-muted">(該当時のみ)</span></label>
                        <select class="form-select d-block w-100" id="content_tag2" name="content_tag2">
                            @if (isset($detail->content_tag2))
                                @foreach ($tags as $k => $v)
                                    @if ($k == $detail->content_tag2)
                                        <option value="{{ old('content_tag2', $detail->content_tag2) }}" selected>
                                            {{ $v }}
                                        </option>
                                        @continue
                                    @endif
                                    <option value={{ $k }}>{{ $v }}</option>
                                @endforeach
                            @else
                                <option value="">選択...</option>
                                @foreach ($tags as $k => $v)
                                    <option value={{ $k }}>{{ $v }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="content_tag3" class="form-label">工事内容3 <span
                                class="text-muted">(該当時のみ)</span></label>
                        <select class="form-select d-block w-100" id="content_tag3" name="content_tag3">
                            @if (isset($detail->content_tag3))
                                @foreach ($tags as $k => $v)
                                    @if ($k == $detail->content_tag3)
                                        <option value="{{ old('content_tag3', $detail->content_tag3) }}" selected>
                                            {{ $v }}
                                        </option>
                                        @continue
                                    @endif
                                    <option value={{ $k }}>{{ $v }}</option>
                                @endforeach
                            @else
                                <option value="">選択...</option>
                                @foreach ($tags as $k => $v)
                                    <option value={{ $k }}>{{ $v }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <!-- 実績詳細テーブル用（左）ここまで -->

            <!-- 画像テーブル用（右） -->
            <div class="col-md-5">
                <div id="images" class="col-sm-12">
                    <label for="image_0" class="form-label"><span
                            class="text-danger">※変更する画像のみ再登録してください。</span><br>※画像の追加は、追加ボタンを押してください。</label>
                    @foreach ($images as $k => $v)
                        <p class="mb-1">{{ $k + 1 }}枚目</p>
                        <img src="{{ asset($v->path . '/works_' . $detail->id . '_' . $k . '.jpg') }}"
                            class="mb-2 k-cheack-img" alt="">
                        <input type="file" class="form-control" id="image_0" placeholder="変更する画像を登録してください"
                            name="image_[]">
                        <input type="text" class="form-control mt-2 mb-4" id="image_0" placeholder="20文字以下推奨"
                            value="{{ old('img_content', $v->img_content) }}" name="img_content_[]" required>
                        <span class="invalid-feedback">画像・説明文を登録してください</span>
                    @endforeach
                </div>


                <div class="col-md-4 mt-3">
                    <input class="btn btn-primary" type="button" value="追加" onclick="addImageEdit()" />
                    <input class="btn btn-outline-primary" type="button" value="削除" onclick="deleteImageEdit()" />
                </div>

            </div>
            <!-- 画像テーブル用（右）ここまで -->
        </div>

        <div class="row col-md-12 px-5">
            <button class="col-md-2 btn btn-primary btn-lg mt-5 mb-3 me-3" type="submit">変更する</button>
            <a class="col-md-2 btn btn-outline-primary btn-lg mt-5 mb-3" href="{{ url('/admin/select') }}">実績変更選択</a>
        </div>
    </form>

    {{-- 削除ボタン --}}
    <div class="col-md-12 ps-5">
        <form method="post" action="{{ route('admin.destroy', $detail) }}" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{ $detail->id }}">
            <input type="hidden" name="user_id" value="{{ $detail->user_id }}">
            <input type="hidden" name="priority" value="{{ $detail->priority }}">
            <button class="col-md-2 btn btn-danger btn-lg mb-5 me-3"
                onClick="return confirm('本当に削除しますか？');">削除する</button>
        </form>
    </div>

</x-app-layout>
