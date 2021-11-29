<?php $__env->startSection('reply'); ?>
<div class="px-4 py-2">
    <div class="h4 mb-3">6.コメント</div>
    <hr>
    <?php $num = 1; ?>
    <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="px-4 py-2">
            <?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($name['id'] === $reply['user_id']): ?>
                    <?php if($myreply['id'] == $reply['id']): ?>
                        [編集中]
                    <?php endif; ?>
                    [コメント<?php echo e($num); ?>]
                    <div class="px-2 py-2">
                        <div class="h5">
                            <?php echo nl2br(e($reply['content'])); ?>

                        </div>
                        <?php if($reply['user_id'] === $user['id']): ?>
                            <div class="d-flex">
                                by あなた
                            </div>
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
        <form action="/replyupdate/<?php echo e($myreply['id']); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type='hidden' name='user_id' value="<?php echo e($user['id']); ?>">
            <textarea class="form-control mb-3" name="replyupdate" id="reply" rows="5" placeholder="返信を入力" required><?php echo e($myreply['content']); ?></textarea>
            <input class="btn btn-primary" type="submit" value="編集する">
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('detaila', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShareMyLEGO\resources\views/replyedit.blade.php ENDPATH**/ ?>