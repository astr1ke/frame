<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <aside class="sidebar">
        <div class="sidebar-inner">

            <!--Подключаем колонку обо мне -->
            <?php include(ROOT.'/view/layout/aboutMe.php'); ?>

           <!-- Подключаем колонку Последние новости-->
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
                                        $i = 1;
                                    ?>
                                    <?php
                                    foreach($articlesRecent as $articleRecent) {
                                        if($i <= 5){
                                        $i++?>
                                        <div class="swiper-slide">
                                            <?php if(stristr($articleRecent->image,'http')==TRUE){ ?>
                                            <iframe max-width="800" width="100%" height="200"
                                                    src=" <?php echo $articleRecent->image ?>" frameborder="0" gesture="media"
                                                    allow="encrypted-media" allowfullscreen></iframe>
                                            <?php }else{ ?>
                                            <img src="<?php echo $articleRecent->image ?>" alt="..." style="height: 200px">
                                            <?php } ?>
                                            <div class="mask"></div>
                                            <div class="slide-content">
                                                <div class="post-title">
                                                    <h5>
                                                        <a href="/article/<?php echo $articleRecent->id ?>"><?php echo $articleRecent->title ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                    }
                                    ?>

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
                        foreach($popArticles as $popArticle){
                            if($i <= 4){
                                $i++;
                                ?>
                                <div class="widget-posts">
                                    <div class="post-thumb">
                                        <?php
                                        if(stristr($popArticle->image,'http')==TRUE){ ?>
                                        <iframe max-width="800" width="100%" height="85" src="<?php echo $popArticle->image ?>"
                                                frameborder="0" gesture="media" allow="encrypted-media"
                                                allowfullscreen></iframe>
                                        <?php }else{?>
                                        <img src="<?php echo $popArticle->image ?>" alt=".....">
                                        <?php } ?>
                                    </div>
                                    <div class="post-title">
                                        <h5><a href="/article/<?php echo $popArticle->id ?>"><?php echo $popArticle->title ?></a></h5>
                                    </div>
                                    <div class="post-view-count post-meta">
                                        <p><?php echo $popArticle->views ?> <span>Просмотр(ов)</span></p>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>

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

                            <?php
                            foreach($categoriesColumn as $cat) {
                                $c = \Models\Article::where('categorie_id', $cat->id);
                                $c = count($c);
                                if ($c > 0) { ?>
                                    <li><a href="/categorie/{{$cat->id}}"><?php echo $cat->name ?></a></li>
                                    <?php
                                }
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
</div>