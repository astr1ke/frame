<div class="widget widget-about-me wow fadeInUp">
    <div class="widget-content">
        <?php
        $aboutMe = \Models\about::findOne(1);
        ?>
        <div class="widget-about-me-profile">
            <img src="/storage/<?php echo $aboutMe->foto?>" alt="...">
        </div>
        <div class="widget-extra-info-holder">
            <div class="widget-author-name">
                <h3><?php echo $aboutMe->name?></h3>
                <span class="author-profession"><?php echo $aboutMe->title?></span>
            </div>
            <div class="widget-author-bio">
                <p><?php echo $aboutMe->text?></p>
            </div>
            <div class="widget-author-signature">
                <img src="/images/signature-one.jpg" alt="...">
            </div>
        </div>
    </div>
</div>
<div class="widget widget-social-links wow fadeInUp">
    <div class="widget-content">
        <?php
        $social = Models\social::findOne(1);
        ?>
        <div class="widget-title">
            <h2>Мои соцсети:</h2>
        </div>
        <div class="widget-extra-info-holder">
            <div class="widget-social-links">
                <ul class="social-links-list">
                    <?php
                    if(!(($social->ok)=='')){ ?>
                    <li class="google-link">
                        <a href="<?php echo $social->ok ?>" class="clearfix" target="_blank">
                            Одноклассники
                            <span class="social-icon">
                                                            <i class="fa fa-odnoklassniki"></i>
                                                             </span>
                        </a>
                    </li>
                    <?php
                    }
                    if(!(($social->vk)=='')){ ?>
                    <li class="facebook-link">
                        <a href="<?php echo $social->vk ?>" class="clearfix" target="_blank">
                            ВКонтакте
                            <span class="social-icon">
                                                                    <i class="fa fa-vk"></i>
                                                             </span>
                        </a>
                    </li>
                    <?php }

                    if(!(($social->inst)=='')){ ?>}
                    <li class="instagram-link">
                        <a href="<?php echo $social->inst?>" class="clearfix" target="_blank">
                            Инстаграмм
                            <span class="social-icon">
                                                                    <i class="fa fa-instagram"></i>
                                                                     </span>
                        </a>
                    </li>
                    <?php }

                    if(!(($social->utub)=='')){ ?>
                    <li class="youtube-link">
                        <a href="<?php $social->utub ?>" class="clearfix" target="_blank">
                            Youtube
                            <span class="social-icon">
                                                                 <i class="fa fa-youtube"></i>
                                                             </span>
                        </a>
                    </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>
</div>