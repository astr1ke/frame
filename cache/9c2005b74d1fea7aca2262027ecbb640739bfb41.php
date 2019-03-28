<?php /* /home/vagrant/code/resources/view/layouts/aboutMe.blade.php */ ?>
<div class="widget widget-about-me wow fadeInUp">
    <div class="widget-content">
        <?php
        $aboutMe = \Models\aboutMe::find(1);
        ?>
        <div class="widget-about-me-profile">
            <img src="<?php echo e(asset('storage').'/'.$aboutMe->foto); ?>" alt="...">
        </div>
        <div class="widget-extra-info-holder">
            <div class="widget-author-name">
                <h3><?php echo e($aboutMe->name); ?></h3>
                <span class="author-profession"><?php echo e($aboutMe->title); ?></span>
            </div>
            <div class="widget-author-bio">
                <p><?php echo e($aboutMe->text); ?></p>
            </div>
            <div class="widget-author-signature">
                <img src="<?php echo e(asset('images')); ?>/signature-one.jpg" alt="...">
            </div>
        </div>
    </div>
</div>
<div class="widget widget-social-links wow fadeInUp">
    <div class="widget-content">
        <?php
        $social = \Models\social::find(1);
        ?>
        <div class="widget-title">
            <h2>Мои соцсети:</h2>
        </div>
        <div class="widget-extra-info-holder">
            <div class="widget-social-links">
                <ul class="social-links-list">

                    <?php if(!(($social->ok)=='')): ?>
                        <li class="google-link">
                            <a href="<?php echo e($social->ok); ?>" class="clearfix" target="_blank">
                                Одноклассники
                                <span class="social-icon">
                                                            <i class="fa fa-odnoklassniki"></i>
                                                             </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(!(($social->vk)=='')): ?>
                        <li class="facebook-link">
                            <a href="<?php echo e($social->vk); ?>" class="clearfix" target="_blank">
                                ВКонтакте
                                <span class="social-icon">
                                                                    <i class="fa fa-vk"></i>
                                                             </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(!(($social->inst)=='')): ?>
                        <li class="instagram-link">
                            <a href="<?php echo e($social->inst); ?>" class="clearfix" target="_blank">
                                Инстаграмм
                                <span class="social-icon">
                                                                    <i class="fa fa-instagram"></i>
                                                                     </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(!(($social->utub)=='')): ?>
                        <li class="youtube-link">
                            <a href="<?php echo e($social->utub); ?>" class="clearfix" target="_blank">
                                Youtube
                                <span class="social-icon">
                                                                 <i class="fa fa-youtube"></i>
                                                             </span>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</div>