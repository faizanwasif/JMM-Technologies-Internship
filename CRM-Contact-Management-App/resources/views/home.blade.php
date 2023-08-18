@extends('layouts.app')

@section('content')
    
    @if (session('list'))
        @php
            session()->forget('list');
        @endphp
        @include('contactlist')
    @elseif (session('tag'))
        @php
            session()->forget('tag');
        @endphp
        @include('pages.tag.view')
    @endif
    
@endsection
