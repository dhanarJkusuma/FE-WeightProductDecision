@extends('layouts.app')

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
                                <li>{{ $err  }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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

                        <div class="create-form">
                            <form method="post" action="{{ url('nilai/create', ['id' => $penerima->id ]) }}">

                            {{ csrf_field() }}

                                <input type="hidden" name="penerima" value="{{  $penerima->id }}"/>

                                @foreach($kriteria as $k)
                                <!-- form nilai -->
                                <div class="form-group">
                                    <label>{{ $k->nama  }}*</label>
                                    <input type="text" class="form-control" name="kriteria[{{ $k->id  }}]" value="{{ $data[$k->id]  }}" placeholder="Nilai" pattern="[0-9]+(\.[0-9][0-9]?)?" />
                                </div>
                                <!-- end form nilai-->
                                @endforeach

                                <button class="btn btn-warning" type="submit">Save</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

