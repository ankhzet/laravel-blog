@extends('layout')

@section('title', trim($post->title, '.') . " - Blog")

@section('content')

	@include('posts.item', ['post' => $post, 'detailed' => true])

@endsection
