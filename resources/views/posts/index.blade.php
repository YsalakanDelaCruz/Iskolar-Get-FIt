@extends('layouts.app')

@section('content')

<div class="row">

    <div id="todolist" class="col-md-3" style="padding-left: 40px; padding-right: 0px;">
        <div class="card card-default">
            <div class="card-header">
                Add to Your To-do-list:
            </div>
                <div class="card-body" style="padding-left: 5px; padding-right: 5px; padding-bottom: 10px; padding-top: 10px">
                    <form name="" id="formToDo" class="form control" action="" style="padding-left: 5px; padding-right: 5px; padding-bottom: 10px; padding-top: 10px">
                        <input type="text" id="newToDo" style="width:80%;" />
                        <button class="btn-sm btn-primary" style="width:19%;" type = "button" onclick = "buttonMake()"> Add </button>
                        <br/><br/>
                    </form>
                </div>

                <div class="card-footer" id ="toDoList">
                    @forelse($lists as $list)
                        <button class="btn btn-success addToDoButton" id="{{$list->id}}"> {{ $list->content }} </button>
                    @empty
                        <p>No List Found</p>
                    @endforelse
                </div>
        </div>
    </div>

    <div id="posts" class="col-md-6">
        <div id="addpost" class="row" style="margin-bottom:13px;">
            <div class="col">
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
        <div id="feed" class="row">
            <div class="col">
            @forelse($posts as $post)
            <div class="" style="margin-bottom:5px;">
                <div class="card card-default">
                    <div class="card-header">
                        <span>{{ $post->user->name }} 
                            &nbsp; <span class="float-right"> {{ $post->created_at->diffForHumans() }}
                                <form class="form-inline float-right" style="clear: none;"action="/home/{{ $post->id }}" method="post">
                                @if ($post->user->id == Auth::user()->id)
                                    &nbsp; | &nbsp; <a href="/home/{{ $post->id }}/edit">Edit</a> &nbsp; | &nbsp;
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
    </div>



    <div id="weight" class="col-md-3" style="padding-left: 0px; padding-right: 40px;">
    <div id="weightcal" class="card card-default">
            <div>
                <div class="wcal">
                    <div class="card-header">
                        Input Weight:
                    </div>
                    <div class="card-body" style="padding-left: 5px; padding-right: 5px; padding-bottom: 4px; padding-top: 10px;">
                        <form name="" id="formWeightCal" class="form control" action="" style="padding-left: 5px; padding-right: 5px; padding-bottom: 10px; padding-top: 10px;">
                            <input type="text" id="weightInput" style="width:80%;"  />
                            <button class="btn-sm btn-primary" type = "button" onclick = "inputWeight()" style="width:19%;"> Go </button>
                        </form>


                        <div id = "weightMsg">

                            <span id="weightErrorMsg"></span>
                            <span id="valueForWeight">

                            @if( ( ($weight2 - $weight1) >= 5) and ($weight1 != null) )

                            <p> You gained: <span style="color:red;">{{ $weight2 - $weight1 }}</span> <span style="color:red;">Better work your hardest the next time!</span></p>

                            @elseif( ($weight2 - $weight1) <= -5 and ($weight1 != null) )

                            <p> You lost: {{ (($weight2 - $weight1) * -1) }} &nbsp; Keep the same spirit up!</p>

                            @endif

                            </span>
                        </div>
                    </div>                    


                    <div id ="weightList" class="card-footer">
                        @forelse($weights->reverse()->slice(0, 5) as $weight)


                            <p id="{{$weight->id}}" class="addToWeight"> Weight: {{ $weight->weight}} &emsp; Date: {{ Carbon\Carbon::parse($weight->created_at)->format('D, j F Y') }} </p>
                              

                        @empty
                            <p>No Records Found</p>
                        @endforelse

                    </div>

                </div>  
            </div>
        </div>

    </div>
</div>


@endsection
