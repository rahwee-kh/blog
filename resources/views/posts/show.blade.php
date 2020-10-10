@extends('layout')

@section('content')

    <h3>{{ $post->title }}</h3>
    {{ $post->content}}


    <p>added at {{ $post->created_at->diffForHumans( )}}</p>

    {{--This compare if post is created lest than 5 minute, it show "New"--}}
    @if( (new Carbon\Carbon())->diffInMinutes($post->created_at) < 5 )
        <strong>New</strong>
    @endif

    @forelse( $post->comments as $comment)

        <p>{{ $comment->content }}</p>
        <p>added at {{ $post->created_at->diffForHumans( )}}</p>
    @empty
        <p>No comment yet</p>

    @endforelse

@endsection