

<?php $__env->startSection('styles'); ?>
    <script src="/modules/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="general-single-page-layout single-page-layout-one" style="margin-bottom: 100px">
        <div class="single-page-wrapper">
            <div class="single-page-inner">
                <div class="container">
                    <div class="row">
                        <p><h3 id="ca">Редактировать информацию о себе<br/></h3></p>

                        <!------- Список ошибок формы ------->
                        
                            
                                
                                
                                
                                    
                                        
                                    
                                
                            
                        

                        <form id="form" class="blocks" action="/admin/aboutMePageEdit" method="post" enctype="multipart/form-data">
                            
                            <div class="fld">
                                <br/>
                                <p class="area">
                                    <textarea class="text" name="text" id="text" rows="10" cols="80"><?php echo e($aboutMe->text); ?></textarea>
                                    <script>
                                        CKEDITOR.replace('text')
                                    </script>
                                </p>
                                <p>
                                    <input type="submit" class="btn" value="Готово" />
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="/modules/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/vagrant/code/resources/view/editor/aboutMePageEdit.blade.php */ ?>