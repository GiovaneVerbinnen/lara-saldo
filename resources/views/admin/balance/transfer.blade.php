@extends('adminlte::page')

@section('title', 'Nova Tranferência')

@section('content_header')
<h1 class="lead-title">Tranferência</h1>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
    <li><a href="">Tranferência</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3>Transferência</h3>
        <p class="lead">Informe o Destinatário</p>
    </div>
    <div class="box-body">
        @include('admin.includes.alerts')

        <form method="POST" action="{{ route('confirm.transfer') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" name="sender" placeholder="Informação do recebedor" class="form-control" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Recarregar</button>
            </div>
        </form>
    </div>
</div>
@stop