@extends('adminlte::page')

@section('title', 'Histórico')

@section('content_header')
<h1>Histórico</h1>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Histórico</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">

    </div>
    @include('admin.includes.alerts')

    <div class="box-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>?Sender?</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($historics as $historic)
                <tr>
                    <td>{{ $historic->id }}</td>
                    <td>{{ $historic->date }}</td>
                    <td>{{ number_format($historic->amount, 2, ',', '.') }}</td>
                    <td>{{ $historic->type}}</td>
                    <td>{{ $historic->user_id_transaction }}</td>
                </tr>
                @empty
                <p>'empty'</p>
                @endforelse

            </tbody>
        </table>
    </div>
</div>



@stop