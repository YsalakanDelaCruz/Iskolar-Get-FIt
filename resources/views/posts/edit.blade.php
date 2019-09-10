@extends('layouts.app')

@section('content')


	        <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                            Edit Post
                        </div>
                        <div class="card-body">
                            <form class="form-group" action="/home/{{$post->id}}" method="POST">
								{{ method_field('put') }}
                                @csrf
                                <textarea name="content" class="form-control">{{ $post->content }}</textarea>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                <input type="submit" class="btn btn-success float-right" value="Save Changes" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection