

<?php $__env->startSection('styles'); ?>
    <style type="text/css">
        .articleCatalog {
            font-size: 14px;
            background: whitesmoke;
            border-radius: 1px;
            padding: 10px;
            width: max-content;
            margin-top: 10px;
        }
        .articleTime{
            font-size: 11px;
            margin-left: 50px;
        }



    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="general-single-page-layout single-page-layout-one">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumb" style="padding: 20px; margin-bottom: 0px; background:url(<?php echo e(asset('images')); ?>/banner/fon.jpg)">
                <ul class="breadcrumb-listing">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Post</a></li>
                </ul>
                <div class="mask"></div>
            </div>
        </div>
        <div class="single-page-wrapper">
            <div class="single-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="main-post-area-holder">
                                <h4 style="margin:50px ">Список статей</h4>

                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="articleCatalog">
                                        <?php
                                        $cat = \Models\Categorie::find($article->categorie_id);
                                        $cat = $cat->name;
                                        $us = \Models\User::find($article->user_id);
                                        if(isset($us)){
                                            $user = $us->username;
                                            $ava =$us->avatar;
                                        }
                                        ?>
                                        <?php if(isset($ava)): ?>
                                            <p>
                                                <img src="<?php echo e($ava); ?>" alt="...." style="max-height: 35px; max-width: 35px; margin-right: 35px">
                                                <a href="/article/<?php echo e($article->id); ?>"><?php echo e($article->title); ?> - #<?php echo e($cat); ?></a>
                                                <a type="button" style="margin-left: 10px; padding: 4px" href="/article/delete/<?php echo e($article->id); ?>" onClick="return confirm('Вы подтверждаете удаление?');">Удалить</a>
                                                <a type="button" style="margin-left: 10px; padding: 4px" href="/articleEdit/<?php echo e($article->id); ?>" >Редактировать</a>
                                            </p>
                                        <?php else: ?>
                                            <p>
                                                <a style="margin-left: 70px" href="/article/<?php echo e($article->id); ?>"><?php echo e($article->title); ?> - #<?php echo e($cat); ?></a>
                                                <a type="button" style="margin-left: 10px; padding: 4px" href="/article/delete/<?php echo e($article->id); ?>" onClick="return confirm('Вы подтверждаете удаление?');">Удалить</a>
                                                <a type="button" style="margin-left: 10px; padding: 4px" href="/articleEdit/<?php echo e($article->id); ?>">Редактировать</a>
                                            </p>
                                        <?php endif; ?>
                                        <?php unset($ava)?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>

                    <?php echo $__env->make('layouts.rigthColumn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--Пагинация-->
                        
                            
                                
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/vagrant/code/resources/view/admin/articleCatalogAdmin.blade.php */ ?>