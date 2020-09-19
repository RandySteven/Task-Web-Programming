@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message')
        You can't do action in this page please <a href="{{ route('post.index') }}">back</a>
@endsection
@section('message', __($exception->getMessage() ?: 'Forbidden'))
