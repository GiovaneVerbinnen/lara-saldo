@extends('adminlte::page')

@section('title', 'Confirmar Tranferência')

@section('content_header')
<h1 class="lead-title">Tranferência</h1>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
    <li><a href="">Tranferência</a></li>
    <li><a href="">Confirmar Tranferência</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3>Confirmar Tranferência</h3>
        <p>Você está transferindo para: {{ $sender->name }}</p>
    </div>
    <div class="box-body">
        @include('admin.includes.alerts')

        <form method="POST" action="{{ route('transfer.store') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="sender_id" value="{{ $sender->id }}" />

            <div class="form-group">
                <input type="text" name="balance" placeholder="Valor:" class="form-control" />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Transferir</button>
            </div>

        </form>
    </div>
</div>
@stop