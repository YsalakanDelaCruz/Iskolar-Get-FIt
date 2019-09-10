@extends('layouts.app')

@section('content')

	
<div class="row">

	<div class="col-md-6 offset-3">
		<div class="card card-default">
			<div class="card-header">
				<span>{{ $post->user->name }} 

					&nbsp; <span class="float-right"> {{ $post->created_at->diffForHumans() }}

					<form class="form-inline float-right" style="clear: none;"action="/home/{{ $post->id }}" method="post">
					@if ($post->user->id == Auth::user()->id)
						| <a href="/home/{{ $post->id }}/edit">Edit</a> |
						{{ method_field('delete') }}
						{{ csrf_field() }}
						<button class=" btn btn-link text-warning" style="clear: none;padding: 0; margin: 0;">Delete</button>
					</form>
					@endif
						</span>
				</span>
			</div>
			<div class="card-body">
				<div>
					{{ $post->content }}
				</div>
			</div>
			<div class="card-footer clearfix" style ="background-color: #fff;">
				<a href="#" id="like-count-{{$post->id}}" class="float-right" data-toggle="modal" data-target="#myModal_{{$post->id}}">{{$post->likes->count()}} like(s)</a>

				@if ($post->user->id != Auth::user()->id)
				<a href="javascript:void(0)" data-pg="{{ $post->id }}" class="btn btn-info like-post btn-info float-left">Like</a>
				@endif

				<!-- Modal -->
				<div id="myModal_{{ $post->id }}" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">People who liked this post: </h4>
							</div>
							<div class="modal-body">
								<p>
									@forelse($post->likes as $like)
									<div>
										<a href="/profile/{{ $like->liker->username }}">{{ $like->liker->username }}</a>
									</div>  
									@empty
									no likes
									@endforelse
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
				<!-- End of modal -->
			</div>

		</div>
	</div>
</div>

@endsection