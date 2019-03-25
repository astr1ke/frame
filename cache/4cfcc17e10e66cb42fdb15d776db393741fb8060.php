<?php /* /home/vagrant/code/view/layouts/header.blade.php */ ?>
<header class="general-header header-layout-one">
    <div class="general-header-inner" >
        <div class="header-top-wrapper">
            <div class="header-top-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="search">
                                <form action="/search" method="post">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input id="search" type="search" name="srch" placeholder="Поиск ..........">
                                    <input type="submit" id="submit" style="display: none">
                                </form>

                            </div>
                        </div>
                        <!-- // col -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="social-networks">
                                <ul class="social-links" style="font-size: 16px">
                                        
                                            
                                                
                                                
                                            
                                                
                                                
                                            
                                        
                                            <a style="margin-right: 35px" href="/login">Войти на сайт</a>
                                        
                                            <script src="//ulogin.ru/js/ulogin.js"></script>
                                            <a id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name,email,photo_big,city,photo;
                                            providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=<?php echo e('http://'. $_SERVER['HTTP_HOST']); ?>/ulogin;
                                            mobilebuttons=0;"></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="site-info">
                <h1 class="site-title">Svetlana Chechina Blog</h1>
            </div>
        </div>
        <nav class="main-nav layout-one">
            <div id="main-nav" class="stellarnav" >
                <ul>
                    <li><a style="font-size: 15px" href="/">Главная</a></li>

                    <li><a style="font-size: 15px" href="/about">Обо мне</a></li>

                    <li><a style="font-size: 15px" href="/articleCatalog">Каталог статей</a>
                        <ul>
                            <li><a style="font-size: 15px">По категориям</a>
                                <ul>
                                    <?php
                                    $categoriesAll = \Models\Categorie::all();
                                    ?>
                                    <?php $__currentLoopData = $categoriesAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="/articleCatalog/categorie/<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </li>
                            <li><a style="font-size: 15px" href="/articleCatalog">Все статьи</a></li>
                            </li>
                        </ul>
                    </li>
                    <li><a style="font-size: 15px" href="/contacts">Обратная связь</a></li>

                    
                        
                    
                        <li><a style="font-size: 15px" href="">Предложить статью</a></li>
                    
                </ul>
            </div>
        </nav>
    </div>
</header>
