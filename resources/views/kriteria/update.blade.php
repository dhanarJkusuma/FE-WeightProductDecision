@extends('layouts.app')

@section('content')


    <div class="container">
        @if(Auth::user()->level==='admin')
            @include('component.menu_admin')
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong>
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>{{ $err  }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title  }}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <a href="{{ urL('kriteria') }}">
                                <button class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                                    Kembali
                                </button>
                            </a>
                        </div>

                        <div class="create-form">
                            <form method="post" action="{{ url('kriteria', ['id' => $kriteria->id ]) }}">

                                <input name="_method" type="hidden" value="PUT">

                                {{ csrf_field() }}

                                <!-- form nama -->
                                <div class="form-group">
                                    <label>Nama*</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $kriteria->nama  }}"/>
                                </div>
                                <!-- end form nama -->

                                <!-- form jenis-kelamin -->
                                <div class="form-group">
                                    <label>Atribut*</label>
                                    <select class="form-control" name="atribut">
                                        <option value="benefit" {{ ($kriteria->bobot=='benefit') ? "selected" : ""}}>Benefit</option>
                                        <option value="cost" {{ ($kriteria->bobot=='cost') ? "selected" : ""}}>Cost</option>
                                    </select>
                                </div>
                                <!-- end form jenis-kelamin -->

                                <!-- form telp -->
                                <div class="form-group">
                                    <label>Bobot*</label>
                                    <input type="text" class="form-control" name="bobot" placeholder="Bobot" pattern="[0-9]+(\.[0-9][0-9]?)?" value="{{ $kriteria->bobot  }}"/>
                                </div>
                                <!-- end form telp-->

                                <button class="btn btn-warning" type="submit">Save</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

