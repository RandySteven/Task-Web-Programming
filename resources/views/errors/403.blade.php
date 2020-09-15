@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message')
        You can't delete or update another post please <a href="{{ route('post.index') }}">back</a>
@endsection
@section('message', __($exception->getMessage() ?: 'Forbidden'))
