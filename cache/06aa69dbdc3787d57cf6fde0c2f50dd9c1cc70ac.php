<?php /* /home/vagrant/code/view/layouts/rigthColumn.blade.php */ ?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <aside class="sidebar">
        <div class="sidebar-inner">

            <!--Подключаем колонку обо мне-->
            <?php echo $__env->make('layouts.aboutMe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--Подключаем колонку Последние новости-->
            <div class="widget widget-recent-posts wow fadeInUp">
                <div class="widget-content">
                    <div class="widget-title">
                        <h2>Последние новости</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                        <div class="widget-recent-posts">
                            <div class="widget-rpag-gallery-container">
                                <div class="swiper-wrapper">

                                    <?php
                                        $articlesRecent = \Models\Article::all();//->sortByDesc('created_at');
                                        $i=1;
                                    ?>
                                    <?php $__currentLoopData = $articlesRecent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $articleRecent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($i<=5): ?>
                                        <?php $i++?>
                                        <div class="swiper-slide">
                                            <?php if(stristr($articleRecent->image,'http')==TRUE): ?>
                                                <iframe max-width="800" width="100%" height="200" src="<?php echo e($articleRecent->image); ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                            <?php else: ?>
                                                <img src="<?php echo e($articleRecent->image); ?>" alt="..." style="height: 200px">
                                            <?php endif; ?>
                                            <div class="mask"></div>
                                            <div class="slide-content">
                                                <div class="post-title">
                                                    <h5><a href="/article/<?php echo e($articleRecent->id); ?>"><?php echo e($articleRecent->title); ?></a></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Подключаем колонку Популярные статьи-->
            <div class="widget widget-popular-post wow fadeInUp">
                <div class="widget-content">
                    <div class="widget-title">
                        <h2>Популярные статьи</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                        <?php
                            $popArticles = \Models\Article::all();//->sortByDesc('views');
                            $i=1;
                        ?>
                        <?php $__currentLoopData = $popArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i<=4): ?>
                            <?php $i++?>
                            <div class="widget-posts">
                                <div class="post-thumb">
                                    <?php if(stristr($popArticle->image,'http')==TRUE): ?>
                                        <iframe max-width="800" width="100%" height="85" src="<?php echo e($popArticle->image); ?>" frameborder="0" gesture="media"
                                                allow="encrypted-media" allowfullscreen></iframe>
                                    <?php else: ?>
                                        <img src="<?php echo e($popArticle->image); ?>" alt=".....">
                                    <?php endif; ?>
                                </div>
                                <div class="post-title">
                                    <h5><a href="/article/<?php echo e($popArticle->id); ?>"><?php echo e($popArticle->title); ?></a></h5>
                                </div>
                                <div class="post-view-count post-meta">
                                    <p><?php echo e($popArticle->views); ?> <span>Просмотр(ов)</span></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
            <!--<div class="widget widget-facebook-page-box wow fadeInUp">
                <div class="widget-content">
                    <div class="widget-title">
                        <h2>Facebook page</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsparklewpthemes%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=298774560483441" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </div>
                </div>
            </div>-->

            <!--Подключаем колонку категории новостей-->
            <div class="widget widget-category wow fadeInUp">
                <div class="widget-content">
                    <?php
                        $categoriesColumn = \Models\Categorie::all();
                    ?>
                    <div class="widget-title">
                        <h2>Все категории</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                        <ul class="widget-category-listings">
                            <li><a href="/">Все категории</a></li>

                            <?php $__currentLoopData = $categoriesColumn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $c = \Models\Article::where('categorie_id',$cat->id);//->get();
                                    $c = count($c);
                                ?>
                                <?php if($c>0): ?>
                                    <li><a href="/categorie/<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
</div>