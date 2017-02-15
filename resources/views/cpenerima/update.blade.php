@extends('layouts.app')


@push('css')
<link href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')  }}" type="text/css" rel="stylesheet"/>
@endpush

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
                            <a href="{{ urL('cpenerima') }}">
                                <button class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                                    Kembali
                                </button>
                            </a>
                        </div>

                        <div class="create-form">
                            <form method="post" action="{{ url('cpenerima', ['id' => $penerima->id ]) }}">

                                <input name="_method" type="hidden" value="PUT">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>NIS*</label>
                                    <input type="text" pattern="[0-9]+" class="form-control" name="nis" placeholder="NIS" value="{{ $penerima->nis  }}"  required/>
                                </div>

                                <!-- form nama -->
                                <div class="form-group">
                                    <label>Nama*</label>
                                    <input type="text" pattern="[A-Za-z]+" class="form-control" name="nama" placeholder="Nama" value="{{ $penerima->nama  }}"/>
                                </div>
                                <!-- end form nama -->

                                <!-- form alamat -->
                                <div class="form-group">
                                    <label>Alamat*</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat">{{ $penerima->alamat  }}</textarea>
                                </div>
                                <!-- end form alamat -->

                                <!-- form jenis-kelamin -->
                                <div class="form-group">
                                    <label>Jenis Kelamin*</label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="L" {{ ($penerima->jenis_kelamin=='L') ? "selected" : ""}}>Laki-laki</option>
                                        <option value="P" {{ ($penerima->jenis_kelamin=='P') ? "selected" : ""}}>Perempuan</option>
                                    </select>
                                </div>
                                <!-- end form jenis-kelamin -->

                                <!-- form calender -->
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group">
                                        <input type="text" id="date" class="form-control" name="tgl_lahir" value="{{ $penerima->tgl_lahir  }}" readonly>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end form calender -->

                                <!-- form telp -->
                                <div class="form-group">
                                    <label>Telp*</label>
                                    <input type="text" class="form-control" name="telp" placeholder="Telp" value="{{ $penerima->telp  }}"/>
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


@push('javascript')
<script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')  }}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip()
        $('#date').datepicker({
            format : 'yyyy-mm-dd'
        });
    });
</script>
@endpush
