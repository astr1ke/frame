<li id="li-comment-{{$data['id']}}" class="comment">

	<article class="review-box clearfix" style="margin-bottom: 0px; min-height: 90px">
		<figure class="rev-thumb"><img src="" alt=""></figure>
		<div class="rev-content" style="padding: 10px">
			<div class="rev-info" style="padding: 0px"><strong>{{$data['user']}} – February 04, 2017: </strong></div>
			<div class="rev-text">
				<p>{{ $data['text'] }}</p>
			</div>
			<div class="rev-reply" style="padding-top: 0px">
				<a href="#"><span><i class="fa fa-reply" aria-hidden="true"></i> Ответить</span></a>
			</div>
		</div>
	</article>

</li>