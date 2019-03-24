
<?php
$textt =  strip_tags($article->text);
?>

<div class="general-single-page-layout single-page-layout-one">
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb" style="padding: 20px; margin-bottom: 0px; background:url({{asset('images')}}/banner/fon.jpg)">
            <ul class="breadcrumb-listing">
                <li><a href="/">Главная</a></li>
                <li><a href="/articleCatalog">Каталог статей</a></li>
                <li><a><?php $article->title ?></a></li>
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
                                    <?php
                                        if(stristr($article->image,'http')==TRUE) {
                                             echo '<iframe max-width="800" width="100%" height="430" src="' . $article->image . '" frameborder="0"';
                                             echo 'gesture="media" allow="encrypted-media" allowfullscreen></iframe>';
                                        } else {
                                             echo '<img src="' . $article->image . '" alt="....">';
                                        }
                                    ?>
                                </div>
                                <div class="single-page-other-information-holder">
                                    <div class="posted-category">
                                        <div class="post-meta-category">
                                            <?php
                                            $categorie = \Models\Categorie::findOne($article->categorie_id);
                                            $categorie = $categorie->name;
                                            ?>
                                            <span><a href="#"><?php echo $categorie ?></a></span>
                                        </div>
                                    </div>
                                    <div class="post-title">
                                        <h2><?php echo $article->title ?></h2>
                                    </div>
                                    <!-- // post-title -->
                                    <div class="post-extra-meta">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="post-author">

                                                    <?php
                                                    $us = \Models\User::findOne($article->user_id);
                                                    if(isset($us)){
                                                        $user = $us->name;
                                                        $ava =$us->avatar;
                                                        if (mb_substr($ava, 0,1) <> 'h'){
                                                            $ava = '/storage/'.$ava;
                                                        }
                                                    }


                                                    if(isset($ava)) {
                                                        if(strpos($ava,'users')) {
                                                           echo  '<img src="' . $ava . '" alt="...." style="max-height: 50px; max-width: 50px">';                                                           } else {
                                                           echo  '<img src="' . $ava . '" alt="...." style="max-height: 50px; max-width: 50px">';                                                         }
                                                           echo  '<span><a href="#">' . $user . '</a></span>';
                                                     } ?>
                                                </div>
                                            </div>
                                            <!-- // col -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="posted-date">
                                                    <span><a><?php echo is_object($article->created_at) ? $article->created_at->format('d  F  Y  в  H:i') : '' ?></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="artText" class="post-the-content" style="word-wrap:break-word">
                                        <p><?php echo $article->text ?></p>
                                    </div>
                                    <div class="post-share" style="text-align: center">
                                        <?php
                                        $textt =  strip_tags($article->text);
                                        ?>
                                        <div class="ya-share2" data-url="http://светланачечина.рус/article/<?php echo $article->id?>" data-title="<?php echo $article->title ?>"
                                             data-description="<?php $textt ?>" data-image="<?php echo $article->image ?>"
                                             data-services="vkontakte,odnoklassniki,gplus,whatsapp,telegram"></div>
                                    </div>
                                    <div class="tags-meta-and-others clearfix">
                                        <div class="post-tags">
                                            <span><a href="#"><?php echo $categorie ?></a></span>
                                        </div>
                                        <div class="view-count">
                                            <span class="display-view-count"><i class="fa fa-eye" aria-hidden="true"></i><?php echo $articleViews ?> просмотра(ов)</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

<!--                            <div class="comment-area-wrapper">-->
<!--                                <div class="comment-area-inner">-->
<!--                                    <div class="comments">-->
<!--                                        <div class="comments__list">-->
<!--                                            <div class="comment-listing-tile">-->
<!--                                                <h4>Найдено коментариев: {{$cc}}</h4>-->
<!--                                            </div>-->
<!--                                            <div style="padding-bottom: 320px">-->
<!--                                                @include('comments.comments_block', ['essence' => $articles])-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>

                    <?php include(ROOT.'/view/layout/rigthColumn.php'); ?>

                </div>
            </div>
        </div>
    </div>
</div>
