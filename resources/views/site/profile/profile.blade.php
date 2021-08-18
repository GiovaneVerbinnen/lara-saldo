@extends('adminlte::page')

@section('title', 'Minha Conta')
@section('content_header')
<h1 class="lead">Minha Conta</h1>
<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Minha Conta</a></li>
    <li><a href="">Atualizar</a></li>
</ol>
@endsection

@section('content')
<div class="content">
    <form action="{{ route('profile-update') }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" placeholder="Nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" placeholder="Nome" disabled
                class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" placeholder="Senha" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Imagem</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
        </div>

    </form>
</div>
@endsection