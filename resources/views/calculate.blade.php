@extends('layouts.app')

@section('content')

    <div class="container">
        @include('component.menu_admin')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Perhitungan</div>

                    <div class="panel-body">
                        <!-- Weight -->
                        <h3>Weight</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Kriteria
                                        </th>
                                        <th>
                                            Weight
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kriteria as $k)
                                    <tr>
                                        <td>{{ $k->nama }}</td>
                                        <td>{{ $data['weight'][$k->id] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Weight -->

                        <!-- S-->
                        <h3>Nilai S</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        Penerima
                                    </th>
                                    <th>
                                        Nilai S
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($penerima as $p)
                                    <tr>
                                        <td>{{ $p->nama }}</td>
                                        <td>
                                            @foreach($data['s'] as $d)


                                                @if($p->id == $d['penerima'])
                                                    {{ $d['s'] }}&nbsp;
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- S-->

                        <!-- V -->
                        <h3>Nilai V</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        Penerima
                                    </th>
                                    <th>
                                        Nilai V
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($penerima as $p)
                                    <tr>
                                        <td>{{ $p->nama }}</td>
                                        <td>

                                            {{ $data['v'][$p->id]  }}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
