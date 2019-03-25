<?php /* /home/vagrant/code/view/Main/main.blade.php */ ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="main-post-area-wrapper main-post-area-layout-one">
            <div class="main-post-area-inner">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="main-post-area-holder">
                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="post-details-holder wow  fadeInUp">
                                    <div class="post-image">
                                        <?php if(stristr($article->image,'http')==TRUE): ?>
                                            <iframe width="560" height="315" src="<?php echo e($article->image); ?>" frameborder="0"
                                                    gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                        <?php else: ?>
                                            <img src="<?php echo e($article->image); ?>" alt="....">
                                        <?php endif; ?>
                                    </div>
                                    <!-- // post image -->
                                    <div class="post-title">
                                        <h2><?php echo e($article->title); ?></h2>
                                    </div>
                                    <!-- // post-title -->
                                    <div class="post-the-content clearfix layout-one-first-letter" style="word-wrap:break-word">

                                    <?php
                                        $txt = preg_replace ('/<img.*>/Uis', '', $article->text);
                                        $txt = preg_replace('/\s{2,}/', '', $txt);
                                        $txt = mb_strimwidth($txt,0,300,'...')
                                    ?> <!---  обрезаем колво символов для превью статей на главной --->

                                        <p><?php echo $txt; ?></p>
                                    </div>
                                    <!-- // post-the-content -->
                                    <div class="post-permalink">
                                        <a href="/article/<?php echo e($article->id); ?>">Читать далее</a>
                                    </div>
                                    <!-- // post-permalink -->
                                    <div class="post-meta-and-share">
                                        <div class="row">
                                            <?php
                                                $articleUser = \Models\User::find($article->user_id);
                                            ?>
                                            <?php if(isset($articleUser)): ?>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="post-author">
                                                        <span class="post-author"><a><?php echo e($articleUser->name); ?></a></span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <!-- // col 4 -->
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="post-share">
                                                    <?php
                                                    $textt =  strip_tags($article->text);
                                                    ?>
                                                    <div class="ya-share2" async="async" data-url="http://светланачечина.рус/article/<?php echo e($article->id); ?>"
                                                         data-title="<?php echo e($article->title); ?>" data-description="<?php echo e($textt); ?>" data-image="<?php echo e($article->image); ?>"
                                                         data-services="vkontakte,odnoklassniki,gplus,whatsapp,telegram"></div>
                                                </div>
                                            </div>
                                            <!-- // col 4 -->
                                             <?php
                                                $commentsCount = count(\Models\Comment::where('article_id',$article->id))//->get())
                                             ?>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="post-comment-count">
                                                    <span class="post-comment-count"><a>коментариев: <?php echo e($commentsCount); ?></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- <article class="post-details-holder wow  fadeInUp">
                            <div class="post-image">
                                <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/G_JtNhTzg5s?rel=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                            </div>

                            <div class="post-title">
                                <h2>This might be your video VBLOG post. You can add video from any website</h2>
                            </div>

                            <div class="post-the-content clearfix layout-one-first-letter">
                                <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...
                                </p>
                            </div>

                            <div class="post-permalink">
                                <a href="#">Continue Reading</a>
                            </div>

                            <div class="post-meta-and-share">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="post-author">
                                            <span class="post-author"><a href="#">Sparkle Themes</a></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="post-share">
                                            <div class="share"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="post-comment-count">
                                            <span class="post-comment-count"><a href="#">17 Comment</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article> -->
                        </div>
                    </div>

                    <!--СайдБар-->
                    <?php echo $__env->make('layouts.rigthColumn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <!--Пагинация-->
                <div class="pagination_holder">
                    <ul class="pagination">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>