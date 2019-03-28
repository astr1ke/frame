

<?php $__env->startSection('styles'); ?>
    <?php
    $textt =  strip_tags($articles->text);
    ?>
    <meta property="og:title" content="<?php echo e($articles->title); ?>"/>
    <meta property="og:description" content="<?php echo e($textt); ?>"/>
    <meta property="og:image" content="<?php echo e($articles->image); ?>"/>
    <meta property="og:url" content= "http://светланачечина.рус/article/<?php echo e($articles->id); ?>" />
    <meta name="title" content="<?php echo e($articles->title); ?>" />
    <meta name="description" content="<?php echo e($textt); ?>" />
    <link rel="image_src" href="http://светланачечина.рус/<?php echo e($articles->image); ?>" />

    <link href="<?php echo e(asset('modules/lightbox')); ?>/jquery-lightbox.css" type="text/css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <script type="text/javascript" src="<?php echo e(asset('modules/lightbox')); ?>/scripts/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('modules/lightbox')); ?>/scripts/jquery.lightbox.js"></script>



    <script>
        jQuery.noConflict();
        jQuery(function($){
            $('#artText img').css("height", "auto");
            $('#artText img').css("width", "auto");
        });
    </script>

    <script>
        if ( !(navigator.userAgent.indexOf('MSIE 6') >= 0) ){
            jQuery.noConflict();
            jQuery(function($){
                $("#artText a").lightbox();
                $.Lightbox.construct({
                    "speed": 500,
                    "show_linkback": true,
                    "keys": {
                        close:	"q",
                        prev:	"z",
                        next:	"x"
                    },
                    "opacity": 0.9,
                    text: {
                        image:		"Картинка",
                        of:			"из",
                        close:		"Закрыть",
                        closeInfo:	"Завершить просмотр можно, кликнув мышью вне картинки.",
                        help: {
                            close:		"",
                            interact:	"Интерактивная подсказка"
                        },
                        about: {
                            text: 	"",
                            title:	"",
                            link:	"/index.html"
                        }
                    }
                });
            });
        }
    </script>
    <div class="general-single-page-layout single-page-layout-one">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumb" style="padding: 20px; margin-bottom: 0px; background:url(<?php echo e(asset('images')); ?>/banner/fon.jpg)">
                <ul class="breadcrumb-listing">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/articleCatalog">Каталог статей</a></li>
                    <li><a><?php echo e($articles->title); ?></a></li>
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

                                <article class="single-page-details-holder wow fadeInUp">
                                    <div class="post-image">
                                        <?php if(stristr($articles->image,'http')==TRUE): ?>
                                                <iframe max-width="800" width="100%" height="430" src="<?php echo e($articles->image); ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                            <?php else: ?>
                                                <img src="<?php echo e($articles->image); ?>" alt="....">
                                            <?php endif; ?>
                                    </div>
                                    <div class="single-page-other-information-holder">
                                        <div class="posted-category">
                                            <div class="post-meta-category">
                                                <?php $categorie = \Models\Categorie::find($articles->categorie_id);
                                                $categorie = $categorie->name;?>
                                                <span><a href="#"><?php echo e($categorie); ?></a></span>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <h2><?php echo e($articles->title); ?></h2>
                                        </div>
                                        <!-- // post-title -->
                                        <div class="post-extra-meta">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="post-author">

                                                        <?php
                                                            $us = \Models\User::find($articles->user_id);
                                                            if(isset($us)){
                                                            $user = $us->username;
                                                            $ava =$us->avatar;
                                                            }
                                                        ?>

                                                        <?php if(isset($ava)): ?>
                                                            <?php if(strpos($ava,'users')): ?>
                                                                <img src="<?php echo e($ava); ?>" alt="...." style="max-height: 50px; max-width: 50px">
                                                            <?php else: ?>
                                                                <img src="<?php echo e($ava); ?>" alt="...." style="max-height: 50px; max-width: 50px">
                                                            <?php endif; ?>
                                                            <span><a href="#"><?php echo e($user); ?></a></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- // col -->
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="posted-date">
                                                        <span><a><?php echo e(is_object($articles->created_at) ? $articles->created_at->format('d  F  Y  в  H:i') : ''); ?></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="artText" class="post-the-content" style="word-wrap:break-word">
                                            <p><?php echo $articles->text; ?></p>
                                        </div>
                                            <div class="post-share" style="text-align: center">
                                                <?php
                                                $textt =  strip_tags($articles->text);
                                                ?>
                                                <div class="ya-share2" data-url="http://светланачечина.рус/article/<?php echo e($articles->id); ?>" data-title="<?php echo e($articles->title); ?>" data-description="<?php echo e($textt); ?>" data-image="<?php echo e($articles->image); ?>" data-services="vkontakte,odnoklassniki,gplus,whatsapp,telegram"></div>
                                            </div>
                                        <div class="tags-meta-and-others clearfix">
                                            <div class="post-tags">
                                                <span><a href="#"><?php echo e($categorie); ?></a></span>
                                            </div>
                                            <div class="view-count">
                                                <span class="display-view-count"><i class="fa fa-eye" aria-hidden="true"></i><?php echo e($articleViews); ?> просмотра(ов)</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <div class="comment-area-wrapper">
                                    <div class="comment-area-inner">
                                        <div class="comments">
                                            <div class="comments__list">
                                                <div class="comment-listing-tile">
                                                    <h4>Блок комментариев</h4>
                                                </div>
                                                <div style="padding-bottom: 320px">
                                                    <?php echo $__env->make('comments.comments_block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('layouts.rigthColumn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/vagrant/code/resources/view/Article/articleView.blade.php */ ?>