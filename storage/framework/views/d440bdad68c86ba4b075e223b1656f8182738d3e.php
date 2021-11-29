<?php $__env->startSection('content'); ?>
<div class="col-md-2 p-0">
    <div class="card h-100">
        <header class="card-header h3 ml-2">タグ一覧</header>
        <div class="card-body py-4 px-4 h5">
            <p>
                <a class='d-block' href='/'>全て表示</a>
            </p>
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>
                    <a href="/?tag=<?php echo e($tag['id']); ?>" class='d-block'>
                        <?php echo e($tag['name']); ?>

                    </a>
                </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<div class="col-md-10 p-0">
    <div class="row justify-content-center ml-0 mr-0 h-100">
        <div class="card w-100">
            <header class="card-header d-flex h3">
                投稿一覧
                <?php if(auth()->guard()->check()): ?>
                    <a class='ml-auto' href='/create'>
                        <i class="fas fa-plus-circle p-0 mr-4"></i>
                    </a>
                <?php endif; ?>
            </header>
            <div class="card-body p-2">
                <?php $i = 1; ?>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight w-50">
                            <img src="<?php echo e('/storage/' . $comment['image_big']); ?>" class='w-100 d-inline img-thumbnail'>
                        </div>
                        <div class="p-2 bd-highlight w-50">
                            <div class="h4">
                                <?php echo e($i); ?>.
                                <a href="/detail/<?php echo e($comment['id']); ?>" class="font-weight-bold"><?php echo e($comment['title']); ?></a><br>
                            </div>
                            <?php echo e($comment['body_1']); ?><br>
                            更新日時：
                            <?php echo e($comment['updated_at']); ?>

                        </div>
                    </div>
                    <hr>
                    <?php $i = $i + 1; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>    
    </div> 
</div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ShareMyLEGO\resources\views/list.blade.php ENDPATH**/ ?>