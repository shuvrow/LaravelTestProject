@extends('layouts.master')

@section('content')
    @if((session('msg')))
        <b>{!! session('msg') !!}</b>

    @endif
@endsection
