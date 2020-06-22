@extends('layouts.app')

@section('content')
    @if(!Auth::guest())
        <a href="/posts/create" class="btn btn-primary pull-right">Create Post</a>
    @endif
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/public/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                        <small>Written on {{ $post->created_at }} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
         @endforeach
        {{ $posts->links() }}
    @else
        <h3>No post found!</h3>
    @endif
@endsection
