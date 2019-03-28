<li id="li-comment-<?php echo e($item['id']); ?>" class="comment">
	<div id="comment-<?php echo e($item['id']); ?>" class="comment-container" style="border: 0px">


		<article class="review-box clearfix" style="margin-bottom: 0px; min-height: 90px">
			<?php
			$userCom = \Models\User::find($item['user_id']);
			if(isset($userCom)){
				$ava =$userCom['avatar'];
			}
			?>
			<?php if(isset($ava)): ?>
				<figure class="rev-thumb"><img src="<?php echo e($ava); ?>" alt=""></figure>
			<?php endif; ?>
			<div class="rev-content" style="padding: 10px">
				<div class="rev-info" style="padding: 0px"><strong><?php echo e($item['user']); ?> – <?php echo e(is_object($item['created_at']) ? $item['created_at']->format('d.m.Y в H:i') : ''); ?> </strong></div>
				<div class="rev-text">
					<p><?php echo e($item['text']); ?></p>
				</div>
				<div class="rev-reply" style="padding-top: 0px">
					<a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-<?php echo e($item['id']); ?>&quot;,&quot;<?php echo e($item['id']); ?>}&quot;,&quot;respond&quot;,&quot;<?php echo e($item['article_id']); ?>&quot;)">Ответить</a>
					<?php
					if($auth->isLoggedIn()){
						if(($auth->hasRole(\Delight\Auth\Role::ADMIN)) or
							(($auth->getUsername() == $item['user'])and
								($item['text'] != 'Пользователь удалил свой комментарий'))){
							echo ("<a class=\"comment-reply-link\" href=\"#respond\" onclick=\"return delComment.updForm(&quot;{$item['id']}&quot;)\">Удалить</a>");
						}
					}
					?>
				</div>
			</div>
		</article>
	</div>
	
		
			
		
	
</li>


<?php /* /home/vagrant/code/resources/view/comments/comment.blade.php */ ?>