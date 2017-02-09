@extends('layouts.app')

@section('content')

    <div class="container">
        @include('component.menu_admin')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <a href="{{ url('home/calculate')  }}">
                                <button type="button" class="btn btn-success">
                                    Lihat Perhitungan Weight Product
                                </button>
                            </a>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                                    @foreach($kriteria as $k)
                                    <th>{{ $k->nama  }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cpenerima as $p)
                                <tr>
                                    <td>{{ $p->nama  }}</td>
                                    @if(array_key_exists($p->id,$data))
                                        @for($i=0;$i<count($data[$p->id]);$i++)
                                            <td>{{ $data[$p->id][$i] }}</td>
                                        @endfor
                                    @endif
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
