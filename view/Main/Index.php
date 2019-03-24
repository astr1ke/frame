
<div class="container">
    <div class="main-post-area-wrapper main-post-area-layout-one">
        <div class="main-post-area-inner">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="main-post-area-holder">
                        <?php foreach($articles as $article){ ?>
                        <article class="post-details-holder wow  fadeInUp">
                            <div class="post-image">
                                <?php
                                if(stristr($article->image,'http')==TRUE) {
                                    echo "<iframe width=\"560\" height=\"315\" src=\"" . $article->image . "\" frameborder=\"0\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen></iframe>";
                                }else{
                                echo "<img src=\" " . $article->image . " \" alt=\"....\">";
                                }
                                ?>
                            </div>
                            <!-- // post image -->
                            <div class="post-title">
                                <h2><?php echo $article->title ?></h2>
                            </div>
                            <!-- // post-title -->
                            <div class="post-the-content clearfix layout-one-first-letter" style="word-wrap:break-word">

                                <?php
                                    $txt = preg_replace ('/<img.*>/Uis', '', $article->text);
                                    $txt = preg_replace('/\s{2,}/', '', $txt);
                                    $txt = mb_strimwidth($txt,0,300,'...')
                                ?> <!---  обрезаем колво символов для превью статей на главной --->

                                <p><?php echo$txt ?></p>
                            </div>
                            <!-- // post-the-content -->
                            <div class="post-permalink">
                                <a href="/article/<?php echo $article->id ?> ">Читать далее</a>
                            </div>
                            <!-- // post-permalink -->
                            <div class="post-meta-and-share">
                                <div class="row">
                                    <?php
                                        $articleUser = \Models\User::findOne($article->user_id);
                                        if (isset($articleUser)){
                                        echo "<div class=\"col-lg-4 col-md-4 col-sm-4 col-xs-12\">";
                                            echo "<div class=\"post-author\">";
                                                echo "<span class=\"post-author\"><a>" . $articleUser->name . "</a></span>";
                                            echo "</div>";
                                        echo "</div>";
                                        }
                                    ?>
                                    <!-- // col 4 -->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="post-share">
                                            <?php
                                            $textt =  strip_tags($article->text);
                                            ?>
                                            <div class="ya-share2" async="async" data-url="http://светланачечина.рус/article/ <?php echo $article->id ?> "
                                                 data-title=" <?php echo $article->title ?> " data-description=" <?php echo $textt ?> "
                                                 data-image=" <?php echo $article->image ?> " data-services="vkontakte,odnoklassniki,gplus,whatsapp,telegram"></div>
                                        </div>
                                    </div>
                                    <!-- // col 4 -->
                                    <?php
                                    $commentsCount = count(\Models\Comment::where('article_id',$article->id))//->get())
                                    ?>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="post-comment-count">
                                            <span class="post-comment-count"><a>коментариев: <?php echo  $commentsCount ?></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>

                <!--СайдБар-->
                <?php include(ROOT.'/view/layout/rigthColumn.php'); ?>


                <!--Пагинация-->
                <div class="pagination_holder">
                    <ul class="pagination">
                       <!-- {{$articles->links()}}-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

