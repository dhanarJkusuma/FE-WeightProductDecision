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
                        <span aria-hidden="true">Ã</span>
                    </button>
                    <strong>Error!</strong>
                    <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err  }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif

                @include('component.alert')

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title  }}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <button class="btn btn-success" data-toggle="modal" href="#create">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                Tambah Kriteria
                            </button>
                        </div>
			<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Atribut</th>
                                    <th>Bobot</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index=1;
                                @endphp
                                @foreach($kriteria as $k)
                                <tr>
                                    <td>{{ $index  }}</td>
                                    <td>{{ $k->nama  }}</td>
                                    <td>{{ $k->atribut }}</td>
                                    <td>{{ $k->bobot  }}</td>
                                    <td>
                                        <a href="{{  url('kriteria',['id' => $k->id]) }}"><button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="lihat data"><span class="glyphicon glyphicon-eye-open"></span> </button></a>
                                        <a href="{{  url()->route('kriteria.edit', ['id' => $k->id])}}"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="ubah data"><span class="glyphicon glyphicon-pencil"></span> </button></a>
                                        <a href="#" data-id="{{ $k->id  }}" class="destroy"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="hapus data"><span class="glyphicon glyphicon-trash"></span> </button></a>
                                    </td>
                                </tr>
                                @php
                                    $index++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
			</div>
                        {{ $kriteria->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Create-->
    <div class="modal fade" id="create" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="{{ url('kriteria')  }}">
                    {{ csrf_field()  }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Kriteria</h4>
                    </div>
                    <div class="modal-body">
                        <div class="create-form">
                            <!-- form nama -->
                            <div class="form-group">
                                <label>Nama*</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama" required/>
                            </div>
                            <!-- end form nama -->

                            <!-- form jenis-kelamin -->
                            <div class="form-group">
                                <label>Atribut*</label>
                                <select class="form-control" name="atribut" required>
                                    <option value="benefit">Benefit</option>
                                    <option value="cost">Cost</option>
                                </select>
                            </div>
                            <!-- end form jenis-kelamin -->

                            <!-- form telp -->
                            <div class="form-group">
                                <label>Bobot*</label>
                                <input type="text" class="form-control" name="bobot" pattern="[0-9]+(\.[0-9][0-9]?)?" placeholder="Bobot" required/>
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
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()

            $('.destroy').on('click', function(){
                var id = $(this).data('id');
                $('#post_delete').attr('action','{{  url('kriteria')  }}/' + id);
                $('#hapus').modal('show');
            });
        });
    </script>
@endpush
