@extends('layouts.app')

@section('content')
    <div class="container">
        @include('component.menu_user')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}</div>
                    <div class="panel-body">
			<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>NIS</th>
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
                                    <td>{{ $c->nis  }}</td>
                                    <td>{{ $c->nama  }}</td>
                                    <td>{{ ($c->jenis_kelamin == 'L') ? 'laki-laki' : 'perempuan' }}</td>
                                    <td>{{ $c->telp  }}</td>
                                    <td>
                                        <a href="{{  route('gpenerima.index',['id' => $c->id]) }}"><button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="lihat data"><span class="glyphicon glyphicon-eye-open"></span> </button></a>
                                    </td>
                                </tr>
                                @php
                                    $index++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
			</div>
                        {{ $calon->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('javascript')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
@endpush
