<?php $__env->startSection('reply'); ?>
<div class="px-4 py-2">
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
                                    by <a href="/person/<?php echo e($reply['id']); ?>" class="font-weight-bold">あなた</a>
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
                                by <a href="/person/<?php echo e($reply['id']); ?>" class="font-weight-bold"><?php echo e($writtername['name']); ?></a><br>
                            <?php endif; ?>
                        <?php else: ?>
                            by <a href="/person/<?php echo e($reply['id']); ?>" class="font-weight-bold"><?php echo e($writtername['name']); ?></a>さん<br>
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
                <div class="text-muted">
                    ※ログインすると返信ができるようになります。
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.share', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShareMyLEGO\resources\views/detail.blade.php ENDPATH**/ ?>