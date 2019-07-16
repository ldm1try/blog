<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Панель управления</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/bs-custom-file-input.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bsskin.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <?php echo $__env->make('blog.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-auto">
                        <div><?php echo $__env->yieldContent('leftSideContent'); ?></div>
                    </div>
                    <div class="col-md">
                        <div><?php echo $__env->yieldContent('content'); ?></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\localhost\blog\resources\views/layouts/admin.blade.php ENDPATH**/ ?>