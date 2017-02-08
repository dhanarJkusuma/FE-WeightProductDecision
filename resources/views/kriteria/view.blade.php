@extends('layouts.app')

@section('content')


    <div class="container">
        @include('component.menu_admin')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <a href="{{ url('kriteria') }}">
                                <button class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                                    Kembali
                                </button>
                            </a>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td><b>Nama</b></td>
                                <td width="1%"> : </td>
                                <td>{{ $kriteria->nama  }}</td>
                            </tr>
                            <tr>
                                <td><b>Atribut</b></td>
                                <td> : </td>
                                <td>{{ $kriteria->atribut  }}</td>
                            </tr>
                            <tr>
                                <td><b>Bobot</b></td>
                                <td> : </td>
                                <td>{{ $kriteria->bobot }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


