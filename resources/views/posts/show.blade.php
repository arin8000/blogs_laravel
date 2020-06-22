@extends('layouts.app')

@section('content')
@if($post)
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{ $post->title }}</h1>
    <img style="width:20%" src="/public/storage/cover_images/{{$post->cover_image}}">
    {{-- <img style="width:20%" src="{{ asset('storage/cover_images/'. $post->cover_image) }}"> --}}
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{ $post->created_at }} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user->id)
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>

            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{ Form::hidden('_method' , 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        @endif
    @endif
@else
    <h1>Post Not Found!</h1>
@endif
@endsection
