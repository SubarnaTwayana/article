@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->body }}</p>
    <a href="{{ route('articles.edit', $article->id) }}">Edit</a>
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
