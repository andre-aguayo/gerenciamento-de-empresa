@extends('layouts.app')
@section('content')
    <div id="app">
        <router-view 
        @isset($values) 
            :values="{{ json_encode($values) }}" 
        @endisset
        
        @if (session('success') != null)
            :message-success="{ 'messageSuccess': {{ session('success') }} }"
        @elseif (session('error') != null)
            :message-error="{ 'messageError': {{ session('error') }} }"
        @endif
            >
        </router-view>
    </div>
@endsection
