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

                                    <?php if($auth->isLoggedIn()): ?>
                                            <?php if($auth->hasRole(\Delight\Auth\Role::ADMIN)): ?>
                                                <a style="margin-right: 35px" href="/admin"><?php echo e($auth->getUsername()); ?></a>
                                                <a style="margin-right: 35px" href="/logout">Выйти</a>
                                            <?php else: ?>
                                                <a style="margin-right: 35px"><?php echo e($auth->getUsername()); ?></a>
                                                <a style="margin-right: 35px" href="/logout">Выйти</a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a style="margin-right: 35px" href="/login">Войти на сайт</a>
                                        <?php endif; ?>
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

                    <?php if($auth->isLoggedIn() and $auth->getRoles()[1]=='ADMIN'): ?>
                        <li><a style="font-size: 15px" href="/articleCreate">Добавить статью</a></li>
                    <?php else: ?>
                        <li><a style="font-size: 15px" href="">Предложить статью</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</header>

<?php /* /home/vagrant/code/resources/view/layouts/header.blade.php */ ?>