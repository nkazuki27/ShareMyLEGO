<?php $__env->startSection('content'); ?>
<div class="col-md-12 p-0">
    <div class="row justify-content-center ml-0 mr-0 h-100">
        <div class="card w-100">
            <header class="card-header d-flex">
                <a href="/detail/<?php echo e($comment['id']); ?>">
                    <i class="fas fa-angle-left p-0 mr-4">投稿画面に戻る</i>
                </a>
                <div class="h3 mb-0">
                    編集
                </div>
                <form method='post' action="/delete/<?php echo e($comment['id']); ?>" id='delete-form' class="ml-auto h3 mb-0">
                    <?php echo csrf_field(); ?>
                    <button class='p-0 mr-4' style='border:none;'><i id='delete-button' class="fas fa-trash"></i></button>
                </form>
            </header>
            <div class="card-body px-4 py-4">
                <form action="/update/<?php echo e($comment['id']); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type='hidden' name='user_id' value="<?php echo e($user['id']); ?>">
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">1.タイトル</div>
                        <label for="title">タイトル名</label>
                        <input class="form-control mb-3" type="text" name="title" id="title" placeholder="タイトルを入力" value="<?php echo e($comment['title']); ?>" required></textarea>
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
                    <hr>
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">2.詳細</div>
                        <label for="body1">紹介文</label>
                        <textarea class="form-control mb-3" name="body1" id="body1" rows="5" placeholder="紹介文を入力" required><?php echo e($comment['body_1']); ?></textarea>
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
                    <hr>
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">3.特徴</div>
                        <label for="body2">おすすめポイント</label>
                        <textarea class="form-control mb-3" name="body2" id="body2" rows="5" placeholder="材料を入力"><?php echo e($comment['body_2']); ?></textarea>
                    </div>
                    <hr>
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">4.タグ</div>
                        <label for="tag">タグ名</label>
                        <input class="form-control mb-3" name="tag" id="tag" placeholder="タグ名を入力" value="<?php echo e($mytag['name']); ?>" required>
                    </div>
                    <hr>
                    <div class="form-group px-4 py-2">
                        <div class="h4 mb-3">5.部品</div>
                        <div class="px-4 py-2">
                            <div id="form_area">
                                <?php $i = 1; ?>
                                <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-body mb-3">
                                        <div class="mb-3 d-flex">
                                            <div class="h5">[部品<?php echo e($i); ?>]</div>
                                            <div class="form-check ml-auto">
                                                <input class="form-check-input" type="checkbox" value="" id="delete_parts_<?php echo e($i); ?>" name="delete_parts_<?php echo e($i); ?>">
                                                <label class="form-check-label" for="delete_parts_<?php echo e($i); ?>">
                                                    削除
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="form-check px-4">
                                                <input class="form-check-input" type="radio" name="q_<?php echo e($i); ?>" value="1" onclick="formSwitch(<?php echo e($i); ?>)" <?php if($part['type'] == 1){ echo "checked" ;} ?>>
                                                <label class="form-check-label" for="q_<?php echo e($i); ?>">
                                                    ブロック
                                                </label>
                                            </div>
                                            <div class="form-check px-4">
                                                <input class="form-check-input" type="radio" name="q_<?php echo e($i); ?>" value="2" onclick="formSwitch(<?php echo e($i); ?>)" <?php if($part['type'] == 2){ echo "checked" ;} ?>>
                                                <label class="form-check-label" for="q_<?php echo e($i); ?>">
                                                    プレート
                                                </label>
                                            </div>
                                            <div class="form-check px-4">
                                                <input class="form-check-input" type="radio" name="q_<?php echo e($i); ?>" value="3" onclick="formSwitch(<?php echo e($i); ?>)" <?php if($part['type'] == 3){ echo "checked" ;} ?>>
                                                <label class="form-check-label" for="q_<?php echo e($i); ?>">
                                                    タイル
                                                </label>
                                            </div>
                                            <div class="form-check px-4">
                                                <input class="form-check-input" type="radio" name="q_<?php echo e($i); ?>" value="4" onclick="formSwitch(<?php echo e($i); ?>)" <?php if($part['type'] == 4){ echo "checked" ;} ?>>
                                                <label class="form-check-label" for="q_<?php echo e($i); ?>">
                                                    その他
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3" style="display:none" id="else_<?php echo e($i); ?>">
                                            <div class="col-auto">
                                                <label for="content_1" class="col-form-label">※その他の場合：</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text"  id="content_<?php echo e($i); ?>" name="content_<?php echo e($i); ?>" class="form-control" placeholder="形" value="<?php echo e($part['content']); ?>">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="number_1_1" class="col-form-label">・サイズ：</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="number" id="number_1_<?php echo e($i); ?>" name="number_1_<?php echo e($i); ?>" class="form-control" placeholder="縦" value="<?php echo e($part['number_1']); ?>">
                                            </div>
                                            <div class="col-auto">
                                                <label for="number_2_1" class="col-form-label">×</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="number" id="number_2_<?php echo e($i); ?>" name="number_2_<?php echo e($i); ?>" class="form-control" placeholder="横" value="<?php echo e($part['number_2']); ?>">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="color_1" class="col-form-label">・色：</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="text" id="color_<?php echo e($i); ?>" name="color_<?php echo e($i); ?>" class="form-control" placeholder="色を入力" value="<?php echo e($part['color']); ?>">
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="count_1" class="col-form-label">・個数：</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="number" id="count_<?php echo e($i); ?>" name="count_<?php echo e($i); ?>" class="form-control" placeholder="個数を入力" value="<?php echo e($part['count']); ?>">
                                            </div>
                                            <div class="col-auto">
                                                <label for="count_1" class="col-form-label">個</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_<?php echo e($i); ?>" value="<?php echo e($part['id']); ?>">
                                    </div>
                                    <hr>
                                    <?php $i = $i +1; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <script src="<?php echo e(asset('/js/edit.js')); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
        <script>
            bsCustomFileInput.init();
        </script>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShareMyLEGO\resources\views/edit.blade.php ENDPATH**/ ?>