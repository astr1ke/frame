<?php /* /home/vagrant/code/view/comments/comments_block.blade.php */ ?>
<?php

	if($article){
		/*
		 * Группируем комментарии по полю parent_id. При этом данное поле становится ключами массива 
		 * коллекций содержащих модели комментариев
		 */
		$com = \Models\Comment::where('article_id', $article->id);//->groupBy('parent_id');
	} else $com = null;

?>


<div class="wrap_result"></div>


<div id="comments">

	<ol class="commentlist group">
		<?php if($com): ?>
		<?php $__currentLoopData = $com; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<!--Выводим только родительские комментарии parent_id = 0-->
			
			<?php if($k): ?>
				<?php break; ?>
			<?php endif; ?>

			<?php echo $__env->make('comments.comment', ['items' => $comments], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
	</ol>
	


	<div id="respond">
		<h3 id="reply-title">Написать <span>комментарий</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Отменить ответ</a></small></h3>

		<form action="comment" method="post" id="commentform">
			<p class="comment-form-author">
				<label for="author">Имя</label>
				<input id="user" name="user" type="text" value="" size="30" aria-required="true" />
			</p>
			<p class="comment-form-email">
				<label for="email">Email</label>
				<input id="email" name="email" type="text" value="" size="30" aria-required="true" />
			</p>
			<p class="comment-form-comment">
				<label for="comment">Ваш комментарий</label>
				<textarea id="comment" name="text" cols="45" rows="8"></textarea>
			</p>

			<input type="hidden" id="comment_post_ID" name="comment_post_ID" value="<?php echo e($id); ?>">

			<input type="hidden" id="comment_parent" name="comment_parent" value="">

			

			<div class="clear"></div>

			<p class="form-submit">
				<input name="submit" type="submit" id="submit" value="Отправить" />
			</p>
		</form>
	</div>
	
</div>
