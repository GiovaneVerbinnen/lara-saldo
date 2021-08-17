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
        <a href=" {{ route('balance.withdraw') }} " class="btn btn-warning"><i class="fa fa-arrow-circle-down"></i>
            Sacar</a>
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


<div>
    <section class="col-lg-7 connectedSortable ui-sortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Sales
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="revenue-chart-canvas" height="300"
                            style="height: 300px; display: block; width: 673px;" width="673"
                            class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="sales-chart-canvas" height="300"
                            style="height: 300px; display: block; width: 673px;" class="chartjs-render-monitor"
                            width="673"></canvas>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>

@stop