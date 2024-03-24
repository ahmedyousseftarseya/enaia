@extends('accountant::layouts.master')

@section('title', __('lang.dashboard'))

@section('page-title', __('lang.dashboard'))

@section('content')

    <p>Module: {!! config('accountant.name') !!}</p>
@endsection
