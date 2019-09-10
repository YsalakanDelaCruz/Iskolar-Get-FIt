
@extends('layouts.app')
<style type="text/css">
    .profile-img{
        max-width: 200px;
        border: 5px solid #fff;
        border-radius:100%;
    }
</style>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card-body text-center">
            @if(Auth::user()->id == $user->id)
            <div style="display: block">
                <a class="btn btn-outline-primary clearfix" href="/profile/{{ Auth::user()->username}}/edit/">Edit Profile</a>
            </div>
            @else
            @endif
            
            <h2>{{ $user->name }} <i>({{ $user->username }})</i></h2>
                <h5>{{ $user->email }}</h5>
                <h5>{{ Carbon\Carbon::parse($user->bdate)->format('l j F Y') }}
                @if(Carbon\Carbon::parse($user->bdate)->diffInYears(\Carbon\Carbon::now()) > 0)
                    [ {{ Carbon\Carbon::parse($user->bdate)->diffInYears(\Carbon\Carbon::now()) }}
                    
                    @if(Carbon\Carbon::parse($user->bdate)->diffInYears(\Carbon\Carbon::now()) == 1)
                        year old ]</h5>
                    @else
                        years old ]</h5>
                    @endif
                @else
                    </h5>
                @endif
                <!-- <input type="submit" class="btn btn-success" value="Follow"></input> -->
            </div>
        </div>
    </div>
    @if(Auth::user()->id == $user->id)
    <div id="addpost" class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Post something
                    </div>
                    <div class="card-body">
                        <form class="form-group" action="/home" method="POST">
                            @csrf
                            <textarea name="content" class="form-control" placeholder="Something on your mind?"></textarea>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                            <input type="submit" class="btn btn-success float-right" value="Post" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endif
    <div id="feed" class="row justify-content-center">
            <div class="col-md-8">
            @forelse($user->posts->reverse() as $post)
            <div class="">
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
                            @if (strlen($post->content) > 100)
                            {{ substr($post->content, 0, 100) }}
                            <a href="/home/{{ $post->id }}">Read more</a>
                            @else
                            {{ $post->content }}
                            @endif
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
            @empty
            <div class=" col-md-3 offset-5">
                No posts found.
            </div>
            @endforelse

            </div>
        </div>

@endsection
