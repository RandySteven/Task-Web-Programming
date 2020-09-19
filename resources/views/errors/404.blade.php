@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message')
    There is no page | page already deleted, please <a href="{{ route('post.index') }}">back</a>
@endsection
@section('message', __('Not Found'))
