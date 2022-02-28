@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="col-md-12 p-0">
        <div class="row justify-content-center ml-0 mr-0 h-100">
            <div class="card w-100">
                <header class="card-header d-flex">
                    <a href="/article/detail/{{ $comment['id'] }}">
                        <i class="fas fa-angle-left p-0 mr-4">投稿に戻る</i>
                    </a>
                    <div class="h3 mb-0">編集</div>
                    <a href="/article/delete/{{$comment['id']}}" id='delete' class="ml-auto h3 mb-0">
                        <button class='p-0 mr-4' style='border:none;' onclick="return confirm('削除しますか?')"><i id='delete-button' class="fas fa-trash"></i></button>
                    </a>
                </header>
                <div class="card-body">
                    <div class="text-muted">*のつく選択肢は入力必須です。</div>
                    <hr>
                    <form action="/article/update/{{ $comment['id'] }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                        <div class="form-group">
                            <div class="container">
                                <div class="h4 mb-3">1.タイトル</div>
                                <label for="title">タイトル名*</label>
                                <input class="form-control mb-3" type="text" name="title" id="title" placeholder="(例)○○" value="{{ $comment['title'] }}" required></textarea>
                                <button type="button" class="btn btn-outline-secondary mb-3" onclick="changeImage(0)">タイトル画像を変更</button>
                                <div id="changeImage_0" style="display:none">
                                    <label for="image_0">タイトル画像</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image_0">
                                            <label class="custom-file-label" for="image" data-browse="参照">画像を選択（ここにドロップすることもできます）</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset_0">取消</button>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted mb-3">※更新しない場合、空欄</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="container">
                                <div class="h4 mb-3">2.詳細</div>
                                <label for="body1">紹介文*</label>
                                <textarea class="form-control mb-3" name="body1" id="body1" rows="5" placeholder="(例)○○を制作しました。" required>{{ $comment['body_1'] }}</textarea>
                                <button type="button" class="btn btn-outline-secondary mb-3" onclick="changeImage(1)">詳細画像1を変更</button>
                                <div id="changeImage_1" style="display:none">
                                    <label for="image_1">詳細画像1</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_1" id="image_1">
                                            <label class="custom-file-label" for="image_1" data-browse="参照">画像を選択（ここにドロップすることもできます）</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset_1">取消</button>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted mb-3">※更新しない場合、空欄</span>
                                </div>
                                <button type="button" class="btn btn-outline-secondary mb-3" onclick="changeImage(2)">詳細画像2を変更</button>
                                <div id="changeImage_2" style="display:none">
                                    <label for="image_2">詳細画像2</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_2" id="image_2">
                                            <label class="custom-file-label" for="image_2" data-browse="参照">画像を選択(ここにドロップすることもできます)</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset_2">取消</button>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted mb-3">※更新しない場合、空欄</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="h4 mb-3">3.特徴</div>
                            <div class="container">
                                <label for="body2">おすすめポイント</label>
                                <textarea class="form-control mb-3" name="body2" id="body2" rows="5" placeholder="(例)○○が特徴的です。">{{ $comment['body_2'] }}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="h4 mb-3">4.タグ*</div>
                            <div class="container">
                                <label for="tag" class="form-label">タグ名</label>
                                <select class="form-control" name="tag" id="tag">
                                    <?php $i = 1; ?>
                                    @foreach($tags as $tag)
                                        <option value="{{ $i }}" <?php if($i == $comment['tag_id']){ echo "selected"; } ?>>{{ $tag }}</option>
                                        <?php $i = $i + 1; ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="h4 mb-3">5.部品</div>
                            <div class="container">
                                <div id="form_area">
                                    <?php $i = 1; ?>
                                    @foreach($parts as $part)
                                        <div class="form-body mb-3">
                                            <div class="mb-3 d-flex">
                                                <div class="h5">[部品{{ $i }}]*</div>
                                                <div class="form-check ml-auto">
                                                    <input class="form-check-input" type="checkbox" value="" id="delete_parts_{{ $i }}" name="delete_parts_{{ $i }}">
                                                    <label class="form-check-label" for="delete_parts_{{ $i }}">
                                                        削除
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="q_{{ $i }}" value="1" onclick="formSwitch({{$i}})" <?php if($part['type'] == 1){ echo "checked" ;} ?>>
                                                <label class="form-check-label" for="q_{{ $i }}">
                                                    ブロック
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="q_{{ $i }}" value="2" onclick="formSwitch({{$i}})" <?php if($part['type'] == 2){ echo "checked" ;} ?>>
                                                <label class="form-check-label" for="q_{{ $i }}">
                                                    プレート
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="q_{{ $i }}" value="3" onclick="formSwitch({{$i}})" <?php if($part['type'] == 3){ echo "checked" ;} ?>>
                                                <label class="form-check-label" for="q_{{ $i }}">
                                                    タイル
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="q_{{ $i }}" value="4" onclick="formSwitch({{$i}})" <?php if($part['type'] == 4){ echo "checked" ;} ?>>
                                                <label class="form-check-label" for="q_{{ $i }}">
                                                    その他
                                                </label>
                                            </div>
                                            <div class="row align-items-center mb-3" <?php if($part['type'] != 4){echo "style='display:none'";} ?> id="else_{{ $i }}">
                                                <div class="col-auto">
                                                    <label for="content_1" class="col-form-label">※その他の場合：</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text"  id="content_{{ $i }}" name="content_{{ $i }}" class="form-control" placeholder="フィギュア" value="{{ $part['content'] }}">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <label for="number_1_1" class="col-form-label">・サイズ：</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="number" id="number_1_{{ $i }}" name="number_1_{{ $i }}" class="form-control" placeholder="縦" value="{{ $part['number_1'] }}">
                                                </div>
                                                <div class="col-auto">
                                                    <label for="number_2_1" class="col-form-label">×</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="number" id="number_2_{{ $i }}" name="number_2_{{ $i }}" class="form-control" placeholder="横" value="{{ $part['number_2'] }}">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <label for="color_1" class="col-form-label">・色：</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="text" id="color_{{ $i }}" name="color_{{ $i }}" class="form-control" placeholder="(例)レッド" value="{{ $part['color'] }}">
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-auto">
                                                    <label for="count_1" class="col-form-label">・個数：</label>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="number" id="count_{{ $i }}" name="count_{{ $i }}" class="form-control" placeholder="(例)2" value="{{ $part['count'] }}">
                                                </div>
                                                <div class="col-auto">
                                                    <label for="count_1" class="col-form-label">個</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_{{ $i }}" value="{{ $part['id'] }}">
                                        </div>
                                        <hr>
                                        <?php $i = $i +1; ?>
                                    @endforeach
                                </div>
                                <script>var i = 1;</script>
                                <button type="button" class="btn btn-outline-secondary" onclick="addForm()">部品を追加</button>
                                
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <input class="btn btn-primary" type="submit" value="編集する">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/edit.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <script>
            bsCustomFileInput.init();
        </script>
    </div>
</div>
@endsection
