@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
<h1>Saldo</h1>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Saldo</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <a href="{{ route('balance.deposit') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-up"></i>
            Recarregar</a>
        @if ($amount > 0)
        <a href=" {{ route('balance.withdraw') }} " class="btn btn-danger"><i class="fa fa-arrow-circle-down"></i>
            Retirar</a>
        @endif
        @if ($amount > 0)
        <a href=" {{ route('balance.transfer') }} " class="btn btn-info"><i class="fa fa-exchange"></i>
            Transferir</a>
        @endif
    </div>
    @include('admin.includes.alerts')

    <div class="box-body">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <div class="small-box bg-green">
            <div class="inner">
                <h3>R$ {{ number_format($amount ,2, ',', ' ')}}</h3>

                <p>Saldo Total</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
            <a href="#" class="small-box-footer">Mais <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>



@stop