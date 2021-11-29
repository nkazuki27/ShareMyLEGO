<?php $__env->startSection('content'); ?>
<div class="col-md-12 p-0">
    <div class="row justify-content-center ml-0 mr-0 h-100">
        <div class="card w-100">
            <header class="card-header d-flex">
                <a href="/">
                    <i class="fas fa-angle-left p-0 mr-4">全体に戻る</i>
                </a>
                <div class="h3 mb-0">
                    新規投稿
                </div>
            </header>
            <div class="card-body px-4 py-4">
                <form action="/store" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type='hidden' name='user_id' value="<?php echo e($user['id']); ?>">
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">1.タイトル</div>
                        <label for="title">タイトル名</label>
                        <input class="form-control mb-3" type="text" name="title" id="title" placeholder="タイトルを入力" required></textarea>
                        <label for="image_0">タイトル画像</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image_0">
                                <label class="custom-file-label" for="image" data-browse="参照">画像を選択(ここにドロップすることもできます)</label>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset_0">取消</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">2.詳細</div>
                        <label for="body1">紹介文</label>
                        <textarea class="form-control mb-3" name="body1" id="body1" rows="5" placeholder="紹介文を入力" required></textarea>
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
                    <hr>
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">3.特徴</div>
                        <label for="body2">おすすめポイント</label>
                        <textarea class="form-control mb-3" name="body2" id="body2" rows="5" placeholder="特徴を入力"></textarea>
                    </div>
                    <hr>
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">4.タグ</div>
                        <label for="tag">タグ名</label>
                        <input class="form-control mb-3" name="tag" id="tag" placeholder="タグ名を入力" required>
                    </div>
                    <hr>
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">5.部品</div>
                        <div class="px-4 py-2">
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
                                            <input type="text" id="content_1" name="content_1" class="form-control" placeholder="形">
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
                                            <input type="text" id="color_1" name="color_1" class="form-control" placeholder="色を入力">
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-auto">
                                            <label for="count_1" class="col-form-label">・個数：</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="number" id="count_1" name="count_1" class="form-control" placeholder="個数を入力">
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
        <script src="<?php echo e(asset('/js/create.js')); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <script>
            bsCustomFileInput.init();
        </script>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShareMyLEGO\resources\views/create.blade.php ENDPATH**/ ?>