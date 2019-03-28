<?php $__env->startSection('content'); ?>
<div class="span9" id="content">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Каталог статей</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название статьи</th>
                            <th>Текст </th>
                            <th>Время создания</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $articles = \Models\Article::all(); $n = 0;?>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($n++); ?></td>
                                <td><a href="/article/<?php echo e($article->id); ?>"><?php echo e($article->title); ?></a></td>
                                <td><?php echo e(mb_strimwidth(strip_tags($article->text), 0, 40)); ?></td>
                                <td><?php echo e($article->created_at); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Список пользователей</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Имя пользователя</th>
                            <th>Email</th>
                            <th>Avatar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $users =\Models\User::all(); $n = 0;?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($n++); ?></td>
                                <td><?php echo e($user->username); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->avatar); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Мои социальные сети</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Аккаунт инстаграмма</th>
                            <th>Аккаунт ВКонтакте</th>
                            <th>Аккаунт Одноклассники</th>
                            <th>Аккаунт Ютуб</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $social =\Models\social::all(); $n = 0;?>
                        <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($soc->inst); ?></td>
                                <td><?php echo e($soc->vk); ?></td>
                                <td><?php echo e($soc->ok); ?></td>
                                <td><?php echo e($soc->utub); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/vagrant/code/resources/view/admin/index.blade.php */ ?>