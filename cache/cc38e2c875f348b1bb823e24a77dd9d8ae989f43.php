<?php /* /home/vagrant/code/resources/view/editor/articleCreate.blade.php */ ?>


<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('modules/toggle/css')); ?>/style.css" rel="stylesheet">

    <script src="/modules/ckeditor/ckeditor.js"></script>
    <style type="text/css">
        .fld {
            background: whitesmoke;
            border-radius: 3px;
            padding: 10px;
            max-width: max-content;

        }

        .fld2 {
            background: whitesmoke;
            border-radius: 3px;
            padding: 15px;
            max-width: max-content;
            height: 82px;
            margin-bottom: 15px;
            margin-top: 15px;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="general-single-page-layout single-page-layout-one" style="margin-bottom: 100px">
        <div class="single-page-wrapper">
            <div class="single-page-inner">
                <div class="container">
                    <div class="row">
                            <p><h3 id="ca">Создание статьи<br/></h3></p>

                            
                            
                                
                                    
                                    
                                    
                                        
                                            
                                        
                                    
                                
                            

                            <form id="form" class="blocks" action="/articleCreate" method="post" enctype="multipart/form-data">

                                <div class="fld">
                                    <p>
                                        <label >Заголовок:</label>
                                        <input type="text" class="text" name="title" />
                                    </p>
                                    <p>
                                        <label >Категория:</label>
                                        <select class="sel" name="categorie_id" size="1">\
                                            <?php $i=0 ?>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($i==0): ?>
                                                    <option selected value='<?php echo e($cat->id); ?>'><?php echo e($cat->name); ?></option>
                                                    <?php $i++ ?>
                                                <?php else: ?>
                                                    <option value='<?php echo e($cat->id); ?>'><?php echo e($cat->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </p>
                                </div>
                                <br/>
                                <p class="area">
                                    <textarea class="text" name="text" id="text" rows="10" cols="80"></textarea>
                                </p>
                                <script>
                                    CKEDITOR.replace('text')
                                </script>

                                <p>
                                    Тип заголовка(фото/видео)
                                </p>
                                <p style="margin-top: 10px">
                                    <label class="switch switch_type1" role="switch" >
                                    <input type="checkbox" class="switch__toggle" name="checkType" id="checkType">
                                    <span class="switch__label"></span>
                                    </label>
                                </p>
                                <div class="fld2" id="fld1" >
                                    <p>
                                    <label id="lp">Фото для заголовка:</label>
                                    <input id="img" type="file"  name="image">
                                    </p>
                                </div>
                                <div class="fld2" id="fld2" style="display: none">
                                    <p>
                                    <label id="lp">Видео для заголовка:</label>
                                    <p>
                                    <input id="img2" type="text"  name="video">
                                    </p>
                                    </p>
                                </div>


                                <input type="hidden" name = "user_id" value="<?php echo e($auth->getUserId()); ?>" />
                                <p>
                                    <label>&nbsp;</label>
                                    <input type="submit" class="btn" value="Опубликовать" />
                                </p>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="/modules/ckeditor/ckeditor.js"></script>

    <script>

        jQuery(function($){


            $("#checkType").click(function () {
                if (document.getElementById('checkType').checked) {
                    document.getElementById('fld2').style.display = 'block';
                    document.getElementById('fld1').style.display = 'none';
                }
                else {document.getElementById('fld1').style.display = 'block';
                    document.getElementById('fld2').style.display = 'none';
                }
            })

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>