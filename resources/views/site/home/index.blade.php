@extends('adminlte::page')

@section('title', 'Home')
@section('content_header')
<h1>Index</h1>
@stop








@section('content')

<div class="content">
    <div class="alert alert-secondary" role="alert">
        This is a secondary alert—check it out!
    </div>
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a class="btn btn-success" href="{{  route('admin.home')  }}">Painel Admin</a>
        <a class="btn btn-info" href="{{  route('profile')  }}">Meu Perfil</a>
        @else
        <a class="btn btn-success" href="{{ route('login') }}">Login</a>
        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
        @endauth
    </div>
    @endif
</div>


@stop