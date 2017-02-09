@extends('layouts.app')

@push('css')
    <link href="{{ asset('plugins/bootstrap-datepicker')  }}" type="text/css" rel="stylesheet"/>
@endpush

@section('content')


    <div class="container">
        @include('component.menu_admin')
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
                        <li>{{ $err }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

                @include('component.alert')

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <button class="btn btn-success" data-toggle="modal" href="#create">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                Tambah Calon
                            </button>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telpon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index=1;
                                @endphp
                                @foreach($calon as $c)
                                <tr>
                                    <td>{{ $index  }}</td>
                                    <td>{{ $c->nama  }}</td>
                                    <td>{{ ($c->jenis_kelamin == 'L') ? 'laki-laki' : 'perempuan' }}</td>
                                    <td>{{ $c->telp  }}</td>
                                    <td>
                                        <a href="{{  url('cpenerima',['id' => $c->id]) }}"><button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="lihat data"><span class="glyphicon glyphicon-eye-open"></span> </button></a>
                                        <a href="{{  url()->route('cpenerima.edit', ['id' => $c->id])}}"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="ubah data"><span class="glyphicon glyphicon-pencil"></span> </button></a>
                                        <a href="{{  url()->route('nilai.create',['penerima' => $c->id]) }}"><button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="penilaian"><span class="glyphicon glyphicon-ok"></span> </button></a>
                                        <a href="#"data-id="{{ $c->id  }}" class="destroy"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="hapus data"><span class="glyphicon glyphicon-trash"></span> </button></a>
                                    </td>
                                </tr>
                                @php
                                    $index++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        {{ $calon->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Create-->
    <div class="modal fade" id="create" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="{{ url('cpenerima')  }}">
                    {{ csrf_field()  }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Calon Penerima Beasiswa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="create-form">
                            <!-- form nama -->
                            <div class="form-group">
                                <label>Nama*</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama" required/>
                            </div>
                            <!-- end form nama -->

                            <!-- form alamat -->
                            <div class="form-group">
                                <label>Alamat*</label>
                                <textarea class="form-control" name="alamat" placeholder="Alamat" required>
                                </textarea>
                            </div>
                            <!-- end form alamat -->

                            <!-- form jenis-kelamin -->
                            <div class="form-group">
                                <label>Jenis Kelamin*</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <!-- end form jenis-kelamin -->

                            <!-- form calender -->
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" id="date" class="form-control" name="tgl_lahir" readonly required>
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- end form calender -->

                            <!-- form telp -->
                            <div class="form-group">
                                <label>Telp*</label>
                                <input type="text" class="form-control" name="telp" pattern="[0-9]+" placeholder="Telp" required/>
                            </div>
                            <!-- end form telp-->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--Modal Create-->

    <!--Modal Delete-->
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post" id="post_delete" action="#">
                    <input type="hidden" name="_method" value="DELETE" >
                    <div class="modal-header">
                        <div class="modal-title">
                            <h4>Dialog konfirmasi</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda benar-benar ingin menghapus data ini ?</p>
                        <strong>
                            Perhatian : Data yang telah dihapus tidak dapat dikembalikan kembali,
                            data-data yang berhubungan dengan data tersebut juga akan terhapus
                        </strong>
                        {{ csrf_field()  }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-danger" value="Hapus"/>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!--Modal Delete-->
@endsection

@push('javascript')
    <script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')  }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
            $('#date').datepicker({
                format : 'yyyy-mm-dd'
            });
            $('.destroy').on('click', function(){
                var id = $(this).data('id');
                $('#post_delete').attr('action','{{  url('cpenerima')  }}/' + id);
                $('#hapus').modal('show');
            });
        });
    </script>
@endpush
