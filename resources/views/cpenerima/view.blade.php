@extends('layouts.app')

@section('content')


    <div class="container">
        @include('component.menu_admin')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title  }}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <a href="{{ url('cpenerima') }}">
                                <button class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                                    Kembali
                                </button>
                            </a>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td><b>NIS</b></td>
                                <td width="1%"> : </td>
                                <td>{{ $penerima->nis  }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama</b></td>
                                <td width="1%"> : </td>
                                <td>{{ $penerima->nama  }}</td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td> : </td>
                                <td>{{ $penerima->alamat  }}</td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td> : </td>
                                <td>{{ ($penerima->jenis_kelamin == 'L') ? "Laki-laki" : "Perempuan"  }}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Lahir</b></td>
                                <td> : </td>
                                <td>{{ date_format(new DateTime($penerima->tgl_lahir), 'd F Y')  }}</td>
                            </tr>
                            <tr>
                                <td><b>Telp</b></td>
                                <td> : </td>
                                <td>{{ $penerima->telp  }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
