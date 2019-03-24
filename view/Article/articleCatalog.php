
<style type="text/css">
    .articleCatalog {
        font-size: 14px;
        background: whitesmoke;
        border-radius: 1px;
        padding: 10px;
        padding-bottom: 0px;
        margin: 3px;
    }
    .articleTime{
        font-size: 11px;
        margin-left: 50px;
    }



</style>

<div class="general-single-page-layout single-page-layout-one">
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb" style="padding: 20px; margin-bottom: 0px; background:url(images/banner/fon.jpg)">
            <ul class="breadcrumb-listing">
                <li><a href="/">Главная</a></li>
                <li><a><?php echo $title ?></a></li>
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
                                <div class="single-page-other-information-holder">
                                    <div class="post-title">
                                        <h2> <h4 style="margin:50px "><?php echo $title ?></h4></h2>
                                    </div>
                                    <?php
                                        if(count($articles) < 1) {
                                            echo '<h5>Ничего не найдено :(</h5>';
                                        }

                                        foreach($articles as $article) {
                                            echo '<div class="post-the-content articleCatalog" style="word-wrap:break-word">';

                                                $cat = \Models\Categorie::findOne($article->categorie_id);
                                                $cat = $cat->name;
                                                $us = \Models\User::findOne($article->user_id);
                                                if(isset($us)){
                                                    $user = $us->name;
                                                    $ava =$us->avatar;
                                                    if (mb_substr($ava, 0,1) <> 'h'){
                                                        $ava = '/storage/'.$ava;
                                                    }
                                                }

                                                if(isset($ava)) {
                                                    echo '<p><img src="' . $ava . '" alt="...." style="max-height: 35px; max-width: 35px; margin-right: 35px">';
                                                    echo '<a href="/article/' . $article->id . '">' . $article->title . ' - #' . $cat . '</a>';
                                                    echo '<a class="articleTime">' . $article->created_at . '</a></p>';
                                                } else {
                                                    echo '<p><a style="margin-left: 70px" href="/article/' . $article->id . '">' . $article->title . ' - #' . $cat . '</a>';
                                                    echo '<a class="articleTime">' . $article->created_at . '</a></p>';
                                                }
                                                unset($ava);
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </article>
                        </div>
                    </div>


                    <?php include(ROOT.'/view/layout/rigthColumn.php'); ?>
                    <!--Пагинация-->
                    <div class="pagination_holder">
                        <ul class="pagination">
<!--                             $articles->links() -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




