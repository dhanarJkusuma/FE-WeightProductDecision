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
                                Tambah User
                            </button>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $index=1;
                            @endphp
                            @foreach($users as $u)
                                <tr>
                                    <td>{{ $index  }}</td>
                                    <td>{{ $u->username  }}</td>
                                    <td>{{ $u->nama  }}</td>
                                    <td>
                                        <a href="{{  url()->route('user.edit', ['id' => $u->id])}}"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="ubah data"><span class="glyphicon glyphicon-pencil"></span> </button></a>
                                        <a href="#" data-id="{{ $u->id  }}" class="chpassword"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="change password"><span class="glyphicon glyphicon-asterisk"></span> </button></a>
                                        <a href="#" data-id="{{ $u->id  }}" class="destroy"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="hapus data"><span class="glyphicon glyphicon-trash"></span> </button></a>
                                    </td>
                                </tr>
                                @php
                                    $index++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Create-->
    <div class="modal fade" id="create" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('user.store')  }}">
                    {{ csrf_field()  }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="create-form">
                            <!-- form nama -->
                            <div class="form-group">
                                <label>Username*</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" required/>
                            </div>
                            <!-- end form nama -->

                            <!-- form nama -->
                            <div class="form-group">
                                <label>Nama*</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama" required/>
                            </div>
                            <!-- end form nama -->

                            <!-- form nama -->
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required/>
                            </div>
                            <!-- end form nama -->

                            <!-- form nama -->
                            <div class="form-group">
                                <label>Password Confirmation*</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required/>
                            </div>
                            <!-- end form nama -->
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

    <!--Modal Chpass-->
    <div class="modal fade" id="chpass" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" id="form_chpass" action="{{ route('user.store')  }}">
                    {{ csrf_field()  }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Ganti Password User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="create-form">
                            <!-- form nama -->
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required/>
                            </div>
                            <!-- end form nama -->

                            <!-- form nama -->
                            <div class="form-group">
                                <label>Password Confirmation*</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required/>
                            </div>
                            <!-- end form nama -->
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
    <!--Modal Chpass-->

    <!--Modal Delete-->
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post" id="post_delete" action="#">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h4>Dialog konfirmasi</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda benar-benar ingin menghapus user ini ?</p>
                        <strong>
                            Perhatian : Data yang telah dihapus tidak dapat dikembalikan kembali.
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
        $('[data-toggle="tooltip"]').tooltip();
        $('.chpassword').on('click', function(){
            var id = $(this).data('id');
            $('#form_chpass').attr('action','{{  url('user/chpassword')  }}/' + id);
            $('#chpass').modal('show');
        });
        $('.destroy').on('click', function(){
            var id = $(this).data('id');
            $('#post_delete').attr('action','{{  url('user/delete')  }}/' + id);
            $('#hapus').modal('show');
        });
    });
</script>
@endpush
