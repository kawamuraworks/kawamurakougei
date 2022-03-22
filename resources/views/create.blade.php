<x-app-layout>
    <main class="col-lg-10 col-sm-12 k-side-pd">
        <div data-bs-spy="scroll" data-bs-target="#sidebarMenu" data-bs-offset="0" class="scrollspy" tabindex="0">
            <h3 class="mx-5 py-3">新規実績登録</h3>
            <form class="needs-validation" novalidate>

                <!-- 実績詳細テーブル用（左） -->
                <div class="row mx-5">
                    <div class="col-md-7 pe-5 k-side-pd">
                        <div class="col-sm-12">
                            <label for="headline" class="form-label">見出し</label>
                            <input type="text" class="form-control" id="headline" placeholder="12字以下推奨" value=""
                                required>
                            <div class="invalid-feedback">
                                見出しを入力してください
                            </div>
                        </div>

                        <div class="col-sm-12 pt-3">
                            <label for="period" class="form-label">施工期間</label>
                            <input type="text" class="form-control" id="period" placeholder="〇年〇ヶ月　又は　〇週間" value=""
                                required>
                            <div class="invalid-feedback">
                                施工期間を入力してください
                            </div>
                        </div>

                        <div class="col-sm-12 pt-3">
                            <label for="request" class="form-label">お客様要望</label>
                            <input type="text" class="form-control" id="request" placeholder="15字以下推奨" value=""
                                required>
                            <div class="invalid-feedback">
                                お客様要望を入力してください
                            </div>
                        </div>

                        <div class="col-sm-12 pt-3">
                            <label for="lead" class="form-label">リード文</label>
                            <textarea rows="5" cols="60" class="form-control" id="lead" placeholder="ここに記入してください" value="" required></textarea>
                            <div class="invalid-feedback">
                                リード文を入力してください
                            </div>
                        </div>

                        <div class="col-sm-12 pt-3">
                            <label for="location" class="form-label">所在地</label>
                            <input type="text" class="form-control" id="location" placeholder="〇〇県△△市" value=""
                                required>
                            <div class="invalid-feedback">
                                所在地を入力してください
                            </div>
                        </div>


                        <div class="row  pt-3">
                            <div class="col-md-4">
                                <label for="type1" class="form-label">用途1</label>
                                <select class="form-select d-block w-100" id="type1" required>
                                    <option>選択...</option>
                                    <option>戸建住宅</option>
                                    <option>集合住宅</option>
                                    <option>個人店舗</option>
                                    <option>大規模店舗</option>
                                    <option>その他</option>
                                </select>
                                <div class="invalid-feedback">
                                    用途を選択してください
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="type2" class="form-label">用途2 <span
                                        class="text-muted">(該当時のみ選択)</span></label>
                                <select class="form-select d-block w-100" id="type2">
                                    <option>選択...</option>
                                    <option>戸建住宅</option>
                                    <option>集合住宅</option>
                                    <option>個人店舗</option>
                                    <option>大規模店舗</option>
                                    <option>その他</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="type3" class="form-label">用途3 <span
                                        class="text-muted">(該当時のみ選択)</span></label>
                                <select class="form-select d-block w-100" id="type3">
                                    <option>選択...</option>
                                    <option>戸建住宅</option>
                                    <option>集合住宅</option>
                                    <option>個人店舗</option>
                                    <option>大規模店舗</option>
                                    <option>その他</option>
                                </select>
                            </div>
                        </div>

                        <div class="row  pt-3">
                            <div class="col-md-4">
                                <label for="content_tag1" class="form-label">工事内容1</label>
                                <select class="form-select d-block w-100" id="content_tag1" required>
                                    <option>選択...</option>
                                    <option>外壁施工</option>
                                    <option>内壁施工</option>
                                    <option>オリジナルデザイン</option>
                                    <option>その他</option>
                                </select>
                                <div class="invalid-feedback">
                                    工事内容を選択してください
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="content_tag2" class="form-label">用途2 <span
                                        class="text-muted">(該当時のみ選択)</span></label>
                                <select class="form-select d-block w-100" id="content_tag2">
                                    <option>選択...</option>
                                    <option>外壁施工</option>
                                    <option>内壁施工</option>
                                    <option>オリジナルデザイン</option>
                                    <option>その他</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="content_tag3" class="form-label">用途3 <span
                                        class="text-muted">(該当時のみ選択)</span></label>
                                <select class="form-select d-block w-100" id="content_tag3">
                                    <option>選択...</option>
                                    <option>外壁施工</option>
                                    <option>内壁施工</option>
                                    <option>オリジナルデザイン</option>
                                    <option>その他</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- 実績詳細テーブル用（左）ここまで -->

                    <!-- 画像テーブル用（右） -->
                    <div class="col-md-5">
                        <div id="image_0" class="col-sm-12">
                            <label for="image0" class="form-label">画像・説明文登録</label>
                            <p class="mb-1">1枚目</p>
                            <input type="file" class="form-control" id="image_0" placeholder="画像を登録してください" value=""
                                required>
                            <input type="text" class="form-control mt-2" id="image_0" placeholder="20文字以下推奨" value=""
                                required>
                            <div class="invalid-feedback">
                                画像・説明文を登録してください
                            </div>
                        </div>

                        <div id="images" class="col-sm-12"></div>

                        <div class="col-md-4 mt-3">
                            <input class="btn btn-primary" type="button" value="追加" onclick="addImage()" />
                            <input class="btn btn-outline-primary" type="button" value="削除" onclick="deleteImage()" />
                        </div>

                    </div>
                    <!-- 画像テーブル用（右）ここまで -->
                </div>

                <div class="row col-md-12 mx-5">
                    <button class="col-md-2 btn btn-primary btn-lg my-5 me-3" type="submit">登録する</button>
                    <a class="col-md-2 btn btn-outline-primary btn-lg my-5" href="#">キャンセル</a>
                </div>
            </form>

        </div>


        </div>
    </main>

    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="./common/scripts/kawamurakougei.js.js"></script>

</x-app-layout>
