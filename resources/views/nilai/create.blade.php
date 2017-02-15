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
                                <table class="table table-bordered">
                                @foreach($kriteria as $k)
                                    <tr>
                                        <td>
                                            <strong>{{ $k->nama  }}</strong>
                                        </td>
                                        <td width="1%">
                                            :
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="kriteria[{{ $k->id  }}]" value="{{ (array_key_exists($k->id,$data)) ? $data[$k->id] : '' }}" placeholder="Nilai" pattern="[0-9]+(\.[0-9][0-9]?)?" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Description :
                                            {{ $k->description  }}
                                        </td>
                                    </tr>
                                @endforeach
                                </table>
                                <button class="btn btn-warning" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

