<?php $__env->startSection('content'); ?>
<div class="col-md-12 p-0">
    <div class="row justify-content-center ml-0 mr-0 h-100">
        <div class="card w-100">
            <header class="card-header d-flex">
                <a href="/">
                    <i class="fas fa-angle-left p-0 mr-4">全体に戻る</i>
                    
                </a>
                <div class="h3 mb-0">
                    <?php echo e($comment['title']); ?>

                </div>
                <?php if(auth()->guard()->check()): ?>
                    <?php if($comment['user_id'] === $user['id']): ?>
                        <form method='post' action="/edit/<?php echo e($comment['id']); ?>" id='delete-form' class="ml-auto h3 mb-0">
                            <?php echo csrf_field(); ?>
                            <button class='p-0 mr-4' style='border:none; color:black'><i id='delete-button' class="fas fa-pen"></i></button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </header>
            <div class="card-body px-4 py-4">
                <div class="px-4 py-2">
                    <?php if(\Auth::check()): ?>
                        <?php if($writtername['id'] === $user['id']): ?>
                            筆者：<a href="/person/<?php echo e($writtername['id']); ?>" class="font-weight-bold">あなた</a>
                        <?php else: ?>
                            筆者：<a href="/person/<?php echo e($writtername['id']); ?>" class="font-weight-bold"><?php echo e($writtername['name']); ?></a>さん
                        <?php endif; ?>
                    <?php else: ?>
                        筆者：<a href="/person/<?php echo e($writtername['id']); ?>" class="font-weight-bold"><?php echo e($writtername['name']); ?></a>さん
                    <?php endif; ?>
                    <br>
                    更新日：<?php echo e($comment['updated_at']); ?>

                </div>
                <hr>
                <div class="px-4 py-2">
                    <div class="h4">1.タイトル画像</div>
                    <img src="<?php echo e('/storage/' . $comment['image_big']); ?>" class='w-100 img-thumbnail'>
                </div>
                <hr>
                <div class="px-4 py-2">
                    <div class="h4 mb-3">2.詳細</div>
                    <?php echo nl2br(e($comment['body_1'])); ?>

                </div>
                <?php if(isset($comment['image_1'])): ?>
                <div class="px-4 py-2">
                    <div class="d-flex flex-row bd-highlight w-100 mb-3">
                        <div class="p-2 bd-highlight w-50 mb-3">
                            <label for="image_1">[詳細画像1]</label>
                            <img src="<?php echo e('/storage/' . $comment['image_1']); ?>" class='w-100 d-inline img-thumbnail' id="image_1">
                        </div>
                        <?php if(isset($comment['image_2'])): ?>
                        <div class="p-2 bd-highlight w-50 mb-3">
                            <label for="image_2">[詳細画像2]</label>
                            <img src="<?php echo e('/storage/' . $comment['image_2']); ?>" class='w-100 d-inline img-thumbnail' id="image_2">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                <hr>
                <div class="px-4 py-2">
                    <div class="h4 mb-3">3.特徴</div>
                    <?php echo nl2br(e($comment['body_2'])); ?>

                </div>
                <hr>
                <div class="px-4 py-2">
                    <div class="h4 mb-3">4.タグ</div>
                    <?php echo e($tag['name']); ?>

                </div>
                <hr>
                <div class="px-4 py-2">
                    <div class="h4 mb-3">5.部品</div>
                    <div class="px-4 py-2">
                        <?php $i = 1; ?>
                        <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-body">
                                <div class="h5 mb-3">[部品<?php echo e($i); ?>]</div>
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight w-50">
                                        <?php if($part['type'] === 1): ?>
                                            <img src="/storage/block.png" class="w-50">
                                        <?php elseif($part['type'] === 2): ?>
                                            <img src="/storage/plate.png" class="w-50">
                                        <?php elseif($part['type'] === 3): ?>
                                            <img src="/storage/tile.png" class="w-50">
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-2 bd-highlight w-25">
                                        <div class="p-2 bd-highlight">
                                            <?php if($part['type'] === 1): ?>
                                                ブロック
                                            <?php elseif($part['type'] === 2): ?>
                                                プレート
                                            <?php elseif($part['type'] === 3): ?>
                                                タイル
                                            <?php else: ?>
                                                その他：<?php echo e($part['content']); ?>

                                            <?php endif; ?>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            大きさ：
                                            <?php echo e($part['number_1']); ?>×<?php echo e($part['number_2']); ?>

                                        </div>
                                        <div class="p-2 bd-highlight">
                                            色：
                                            <?php echo e($part['color']); ?>

                                        </div>
                                        <div class="p-2 bd-highlight">
                                        個数：
                                        <?php echo e($part['count']); ?>個
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php $i = $i + 1; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="px-4 py-2">
                    <?php if(\Auth::check()): ?>
                        <?php if($comment['user_id'] === $user['id']): ?>
                            <a class="btn btn-secondary btn-sm">いいね <?php echo e(count($likes)); ?></a>
                        <?php else: ?>
                            <?php if($mylike === 1): ?>
                                <a href="/unlike/<?php echo e($comment['id']); ?>" class="btn btn-secondary btn-sm">いいね <?php echo e(count($likes)); ?></a>
                            <?php else: ?>
                                <a href="/like/<?php echo e($comment['id']); ?>" class="btn btn-success btn-sm">いいね <?php echo e(count($likes)); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <p>
                            <a class="btn btn-secondary btn-sm">いいね <?php echo e(count($likes)); ?></a>
                        </p>
                        <div class="text-muted">
                            ※ログインするといいねができるようになります。
                        </div>
                    <?php endif; ?>
                </div>
                <hr>
                <?php echo $__env->yieldContent('reply'); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShareMyLEGO\resources\views/layouts/share.blade.php ENDPATH**/ ?>