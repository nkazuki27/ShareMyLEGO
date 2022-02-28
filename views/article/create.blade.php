@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="col-md-12 p-0">
        <div class="row justify-content-center ml-0 mr-0 h-100">
            <div class="card w-100">
                <header class="card-header d-flex">
                    <a href="/">
                        <i class="fas fa-angle-left p-0 mr-4">ホームに戻る</i>
                    </a>
                    <div class="h3 mb-0">新規投稿</div>
                </header>
                <div class="card-body">
                    <div class="text-muted">*のつく選択肢は入力必須です。</div>
                    <hr>
                    <form action="/article/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                        <div class="form-group">
                            <div class="container">
                                <div class="h4 mb-3">1.タイトル</div>
                                <label for="title">タイトル名*</label>
                                <input class="form-control mb-3" name="title" id="title" placeholder="(例)○○" required>
                                <label for="image_0">タイトル画像*</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image_0" required>
                                        <label class="custom-file-label" for="image" data-browse="参照">画像を選択(ここにドロップすることもできます)</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset_0">取消</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="container"> 
                                <div class="h4 mb-3">2.詳細</div>
                                <label for="body1">紹介文*</label>
                                <textarea class="form-control mb-3" name="body1" id="body1" rows="5" placeholder="(例)○○を制作しました。" required></textarea>
                                <label for="image_1">詳細画像1</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image_1" id="image_1">
                                        <label class="custom-file-label" for="image_1" data-browse="参照">画像を選択(ここにドロップすることもできます)</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset_1">取消</button>
                                    </div>
                                </div>
                                <label for="image_2">詳細画像2</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image_2" id="image_2">
                                        <label class="custom-file-label" for="image_2" data-browse="参照">画像を選択(ここにドロップすることもできます)</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset_2">取消</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="container">
                                <div class="h4 mb-3">3.特徴</div>
                                <label for="body2">おすすめポイント*</label>
                                <textarea class="form-control mb-3" name="body2" id="body2" rows="5" placeholder="(例)○○が特徴的です。" required></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="container">
                                <div class="h4 mb-3">4.タグ</div>
                                <label for="tag" class="form-label">タグ名*</label>
                                <select class="form-control" name="tag" id="tag" required>
                                    <?php $i = 1; ?>
                                    @foreach($tags as $tag)
                                        <option value="{{ $i }}">{{ $tag }}</option>
                                        <?php $i = $i + 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="container">
                                <div class="h4 mb-3">5.部品</div>
                                <div id="form_area">
                                    <div class="form-body">
                                        <div class="h5 mb-3">[部品1]</div>
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input" type="radio" name="q_1" id="1" value="1" onclick="formSwitch(1)">
                                            <label class="form-check-label" for="q_1">
                                                ブロック
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input" type="radio" name="q_1" id="2" value="2" onclick="formSwitch(1)">
                                            <label class="form-check-label" for="q_1">
                                                プレート
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input" type="radio" name="q_1" id="3"  value="3" onclick="formSwitch(1)">
                                            <label class="form-check-label" for="q_1">
                                                タイル
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input" type="radio" name="q_1" id="4"  value="4" onclick="formSwitch(1)">
                                            <label class="form-check-label" for="q_1">
                                                その他
                                            </label>
                                        </div>
                                        <div class="row align-items-center mb-3" style="display:none" id="else_1">
                                            <div class="col-auto">
                                                <label for="content_1" class="col-form-label">※その他の場合：</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" id="content_1" name="content_1" class="form-control" placeholder="(例)フィギュア">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="number_1_1" class="col-form-label">・サイズ：</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="number" id="number_1_1" name="number_1_1" class="form-control" placeholder="縦">
                                            </div>
                                            <div class="col-auto">
                                                <label for="number_2_1" class="col-form-label">×</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="number" id="number_2_1" name="number_2_1" class="form-control" placeholder="横">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="color_1" class="col-form-label">・色：</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" id="color_1" name="color_1" class="form-control" placeholder="(例)レッド">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="count_1" class="col-form-label">・個数：</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="number" id="count_1" name="count_1" class="form-control" placeholder="(例)2">
                                            </div>
                                            <div class="col-auto">
                                                <label for="count_1" class="col-form-label">個</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <script>var i = 2;</script>
                                <button type="button" class="btn btn-outline-secondary" onclick="addForm()">部品を追加</button>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center mt-3">
                            <input class="btn btn-primary" type="submit" value="投稿する">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <script src="{{ asset('/js/create.js') }}"></script>
        <script>
            bsCustomFileInput.init();
        </script>
    </div>
</div>
@endsection
