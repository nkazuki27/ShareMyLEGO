<?php $__env->startSection('content'); ?>
<div class="row justify-content-center ml-0 mr-0 h-100">
    <div class="col-md-12 p-0">
        <div class="card">
            <header class="card-header d-flex h3 mb-3">
                <a href="/home">
                    <i class="fas fa-angle-left p-0 mr-4"></i>
                </a>
                <?php echo e($comment['title']); ?>

                <?php if(auth()->guard()->check()): ?>
                    <?php if($comment['user_id'] === $user['id']): ?>
                        <form method='post' action="/edit/<?php echo e($comment['id']); ?>" id='delete-form' class="ml-auto">
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
                            筆者：あなた
                        <?php else: ?>
                            筆者：<?php echo e($writtername['name']); ?>さん
                        <?php endif; ?>
                    <?php else: ?>
                        筆者：<?php echo e($writtername['name']); ?>さん
                    <?php endif; ?>
                    <br>
                    更新日：<?php echo e($comment['updated_at']); ?>

                </div>
                <hr>
                <div class="px-4 py-2">
                    <div class="h4">1.画像</div>
                    <img src="<?php echo e('/storage/' . $comment['image_big']); ?>" class='w-100 img-thumbnail'>
                </div>
                <hr>
                <div class="px-4 py-2">
                    <div class="h4 mb-3">2.紹介文</div>
                    <?php echo nl2br(e($comment['body_1'])); ?>

                </div>
                <?php if(isset($comment['image_1'])): ?>
                <div class="px-4 py-2">
                    <div class="d-flex flex-row bd-highlight w-100 mb-3">
                        <div class="p-2 bd-highlight w-50 mb-3">
                            <img src="<?php echo e('/storage/' . $comment['image_1']); ?>" class='w-100 d-inline img-thumbnail'>
                        </div>
                        <?php if(isset($comment['image_2'])): ?>
                        <div class="p-2 bd-highlight w-50 mb-3">
                            <img src="<?php echo e('/storage/' . $comment['image_2']); ?>" class='w-100 d-inline img-thumbnail'>
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
                        <a class="btn btn-secondary btn-sm">いいね <?php echo e(count($likes)); ?></a>
                    <?php endif; ?>
                </div>
                <hr>
                <?php echo $__env->yieldContent('reply'); ?>
                <!--<div class="px-4 py-2">
                    <div class="h4 mb-3">6.コメント</div>
                    <hr>
                    <?php $num = 1; ?>
                    <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="px-4 py-2">
                            <?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($name['id'] === $reply['user_id']): ?>
                                    [コメント<?php echo e($num); ?>]
                                    <div class="px-2 py-2">
                                        <div class="h5">
                                            <?php echo nl2br(e($reply['content'])); ?>

                                        </div>
                                        <?php if(\Auth::check()): ?>
                                            <?php if($reply['user_id'] === $user['id']): ?>
                                                <div class="d-flex">
                                                    by あなた
                                                    <form method='post' action="/replyedit/<?php echo e($reply['id']); ?>" id='delete-form'>
                                                        <?php echo csrf_field(); ?>
                                                        <button class='p-0 ml-2' style='border:none; color:black'><i id='delete-button' class="fas fa-pen"></i></button>
                                                    </form>
                                                    <form method='post' action="/replydelete/<?php echo e($reply['id']); ?>" id='delete-form'>
                                                        <?php echo csrf_field(); ?>
                                                        <button class='p-0 ml-2' style='border:none; color:black'><i id='delete-button' class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            <?php else: ?>
                                                by <?php echo e($name['name']); ?><br>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            by <?php echo e($name['name']); ?><br>
                                        <?php endif; ?>
                                        日時：<?php echo e($reply['updated_at']); ?>

                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <hr>
                        </div>
                        <?php $num = $num + 1 ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="px-4 py-2">
                    <div class="h4 mb-3">7.返信</div>
                        <div class="form-body px-4 py-2">
                            <?php if(\Auth::check()): ?>
                                <form action="/reply/<?php echo e($comment['id']); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type='hidden' name='user_id' value="<?php echo e($user['id']); ?>">
                                    <textarea class="form-control mb-3" name="reply" id="reply" rows="5" placeholder="返信を入力" required></textarea>
                                    <input class="btn btn-primary" type="submit" value="返信する">
                                </form>
                            <?php else: ?>
                                ログインすると返信ができるようになります。
                            <?php endif; ?>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShareMyLEGO\resources\views/detaila.blade.php ENDPATH**/ ?>