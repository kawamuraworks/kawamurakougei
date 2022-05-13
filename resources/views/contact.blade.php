<x-app-layout>

    <div class="row justify-content-center" style="margin-left: 0; margin-right:0">
        <div class="col-md-7 px-5 k-side-pd">
            <div class="col-12">
                <h3 class="pt-5 pb-3">お問合せ</h3>
            </div>
        </div>
    </div>

    <x-validation-errors class="mx-5 mb-4 px-4 py-3 alert-danger rounded" :errors="$errors" />
    <x-message :message="session('message')" />

    <form method="post" action="#" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        <div class="row justify-content-center" style="margin-left: 0; margin-right:0">
            <div class="col-md-7 px-5 k-side-pd">
                {{-- お名前・フリガナ --}}
                <div class="row">
                    <div class="col-6">
                        <label for="name" class="form-label">お名前 ※</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                        <div class="invalid-feedback">
                            お名前を入力してください
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="kana" class="form-label">フリガナ ※</label>
                        <input type="text" class="form-control" id="kana" name="kana" value="{{ old('kana') }}"
                            required>
                        <div class="invalid-feedback">
                            フリガナを入力してください
                        </div>
                    </div>
                </div>

                {{-- メールアドレス --}}
                <div class="col-12 pt-3">
                    <label for="email" class="form-label">メールアドレス ※</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        required>
                    <div class="invalid-feedback">
                        メールアドレスを入力してください
                    </div>
                </div>

                {{-- 電話番号 --}}
                <div class="row col-12 pt-3 mx-0">
                    <label for="tel" class="form-label ps-0">お電話番号 ※</label>
                    <div class="col-4 ps-0">
                        <input type="text" class="form-control" id="tel" name="tel1" value="{{ old('tel1') }}"
                            required>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="tel" name="tel2" value="{{ old('tel2') }}"
                            required>
                    </div>
                    <div class="col-4 pe-0">
                        <input type="text" class="form-control" id="tel" name="tel3" value="{{ old('tel3') }}"
                            required>
                    </div>
                    <div class="invalid-feedback">
                        電話番号を入力してください
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

            </div>
            <!-- 実績詳細テーブル用（左）ここまで -->

        </div>

        <div class="row justify-content-center" style="margin-left: 0; margin-right:0">
            <div class="col-md-7 px-5 k-side-pd" style="margin-left: 0; margin-right:0">
                <button class="col-5 btn btn-primary btn-lg my-5 me-3" type="submit">送信する</button>
                <a class="col-6 btn btn-outline-primary btn-lg my-5" href="{{ url('/') }}">トップへ戻る</a>
            </div>
        </div>

    </form>

</x-app-layout>
