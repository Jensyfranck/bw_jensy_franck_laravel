@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $news->title }}</h1>
        @if($news->cover_image)
            <img src="{{ asset('storage/' . $news->cover_image) }}" alt="{{ $news->title }} Cover Image" style="max-width: 100%;">
        @endif
        <div class="news-content">
            {!! nl2br(e($news->content)) !!}
        </div>
        @if($news->published_at)
            <p>Published on: {{ $news->published_at->format('M d, Y') }}</p>
        @else
            <p>Publish date not set</p>
        @endif
    </div>
@endsection
