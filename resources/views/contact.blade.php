<x-app-layout>

    <div class="row ms-5 justify-content-center">
        <div class="col-md-7 pe-5 k-side-pd">
            <h3 class="pt-5 pb-3">お問合せ</h3>
        </div>
    </div>

    <x-validation-errors class="mx-5 mb-4 px-4 py-3 alert-danger rounded" :errors="$errors" />
    <x-message :message="session('message')" />

    <form method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data" class="needs-validation"
        novalidate>
        @csrf

        <div class="row ms-5 justify-content-center">
            <div class="col-md-7 pe-5 k-side-pd">
                {{-- お名前・フリガナ --}}
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name" class="form-label">お名前 ※</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                        <div class="invalid-feedback">
                            お名前を入力してください
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="kana" class="form-label">フリガナ ※</label>
                        <input type="text" class="form-control" id="kana" name="kana" value="{{ old('kana') }}"
                            required>
                        <div class="invalid-feedback">
                            フリガナを入力してください
                        </div>
                    </div>
                </div>

                {{-- メールアドレス --}}
                <div class="col-sm-12 pt-3">
                    <label for="email" class="form-label">メールアドレス ※</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    <div class="invalid-feedback">
                        メールアドレスを入力してください
                    </div>
                </div>

                {{-- 電話番号 --}}
                <div class="row  pt-3">
                    <div class="col-md-4">
                        <label for="tel1" class="form-label">お電話番号 ※</label>
                        <input type="text" class="form-control" id="tel1" name="tel1" value="{{ old('tel1') }}" required>
                        <div class="invalid-feedback">
                            電話番号を入力してください
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="tel2" class="form-label">　</label>
                        <input type="text" class="form-control" id="tel2" name="tel2" value="{{ old('tel2') }}" required>
                        <div class="invalid-feedback">
                            電話番号を入力してください
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="tel3" class="form-label">　</label>
                        <input type="text" class="form-control" id="tel3" name="tel3" value="{{ old('tel3') }}" required>
                        <div class="invalid-feedback">
                            電話番号を入力してください
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 pt-3">
                    <label for="location" class="form-label">ご住所</label>
                    <input type="text" class="form-control" id="location" name="location"
                        value="{{ old('location') }}" placeholder="都道府県よりご記入ください" required>
                    <div class="invalid-feedback">
                        ご住所を入力してください
                    </div>
                </div>

                {{-- お問合せ内容 --}}
                <div class="col-sm-12 pt-3">
                    <label for="inquiry" class="form-label">お問合せ内容 ※</label>
                    <textarea rows="5" cols="60" class="form-control" id="inquiry" name="inquiry"
                        required>{{ old('inquiry') }}</textarea>
                    <div class="invalid-feedback">
                        お問合せ内容を入力してください
                    </div>
                </div>

                <div class="row  pt-3">
                    <div class="col-md-5">
                        <label for="method" class="form-label">ご希望の連絡方法</label>
                        <select class="form-select d-block w-100" id="method" name="method" required>
                            <option value="">--選択してください</option>
                            @foreach ($method as $k => $v)
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            ご希望連絡先を選択してください
                        </div>
                    </div>

                    <div class="col-md-7">
                        <label for="timing" class="form-label">ご希望の連絡時間 <span
                                class="text-muted">(電話連絡を希望の方のみ)</span></label>
                        <select class="form-select d-block w-100" id="timing" name="timing">
                            <option value="">--選択してください</option>
                            @foreach ($timing as $k => $v)
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                {{-- <div class="row  pt-3">
                    <div class="col-md-4">
                        <label for="type1" class="form-label">用途1</label>
                        <select class="form-select d-block w-100" id="type1" name="type1" required>
                            <option value="">選択...</option>
                            @foreach ($types as $k => $v)
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
                            <option value="">選択...</option>
                            @foreach ($types as $k => $v)
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="type3" class="form-label">用途3 <span
                                class="text-muted">(該当時のみ)</span></label>
                        <select class="form-select d-block w-100" id="type3" name="type3">
                            <option value="">選択...</option>
                            @foreach ($types as $k => $v)
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row  pt-3">
                    <div class="col-md-4">
                        <label for="content_tag1" class="form-label">工事内容1</label>
                        <select class="form-select d-block w-100" id="content_tag1" name="content_tag1" required>
                            <option value="">選択...</option>
                            @foreach ($tags as $k => $v)
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
                            <option value="">選択...</option>
                            @foreach ($tags as $k => $v)
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="content_tag3" class="form-label">工事内容3 <span
                                class="text-muted">(該当時のみ)</span></label>
                        <select class="form-select d-block w-100" id="content_tag3" name="content_tag3">
                            <option value="">選択...</option>
                            @foreach ($tags as $k => $v)
                                <option value={{ $k }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
            </div>
            <!-- 実績詳細テーブル用（左）ここまで -->

        </div>

        <div class="row col-md-12 ms-5 justify-content-center">
            <button class="col-md-2 btn btn-primary btn-lg my-5 me-3" type="submit">送信する</button>
            <a class="col-md-2 btn btn-outline-primary btn-lg my-5" href="{{ url('/') }}">トップページに戻る</a>
        </div>
    </form>

</x-app-layout>
