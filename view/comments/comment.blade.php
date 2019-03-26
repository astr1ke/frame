@foreach($items as $item)

	<li id="li-comment-{{$item->id}}" class="comment">
		<div id="comment-{{$item->id}}" class="comment-container" style="border: 0px">


			<article class="review-box clearfix" style="margin-bottom: 0px; min-height: 90px">
                <?php
                $userCom = \Models\User::find($item->user_id);
                if(isset($userCom)){
                    $ava =$userCom->avatar;
                }
                ?>
				@if(isset($ava))
					<figure class="rev-thumb"><img src="{{$ava}}" alt=""></figure>
				@endif
				<div class="rev-content" style="padding: 10px">
					<div class="rev-info" style="padding: 0px"><strong>{{$item->user}} – {{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}} </strong></div>
					<div class="rev-text">
						<p>{{ $item->text }}</p>
					</div>
					<div class="rev-reply" style="padding-top: 0px">
						<a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{$item->id}}&quot;,&quot;{{$item->id}}&quot;,&quot;respond&quot;,&quot;{{$item->article_id}}&quot;)">Ответить</a>
                        <?php
                        if($auth->isLoggedIn()){
                            if(($auth->hasRole(\Delight\Auth\Role::ADMIN)) or
                                (($auth->getUsername() == $item->user)and
                                    ($item->text != 'Пользователь удалил свой комментарий'))){
                                echo ("<a class=\"comment-reply-link\" href=\"#respond\" onclick=\"return delComment.updForm(&quot;$item->id&quot;)\">Удалить</a>");
                            }
                        }
                        ?>
					</div>
				</div>
			</article>


		</div>
			@if(isset($com[$item->id]))
				<ul class="children">
					@include('comments.comment', ['items' => $com[$item->id]])
				</ul>
		@endif

	</li>

@endforeach