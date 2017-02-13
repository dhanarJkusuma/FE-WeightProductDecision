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
                            <a href="{{ urL('cpenerima') }}">
                                <button class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                                    Kembali
                                </button>
                            </a>
                        </div>

                        <div class="create-form">
                            <form method="post" action="{{ route('user.update', ['id' => $user->id ]) }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Username*</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username  }}" required/>
                                </div>

                                <!-- form nama -->
                                <div class="form-group">
                                    <label>Nama*</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $user->nama  }}"/>
                                </div>
                                <!-- end form nama -->
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
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
