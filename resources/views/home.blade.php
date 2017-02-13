@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Auth::user()->level==='admin')
            @include('component.menu_admin')
        @else
            @include('component.menu_user')
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Selamat Datang, di Sistem Penunjang Keputusan Penerimaan Beasiswa SMK Perwira Bangsa</strong></div>

                    <div class="panel-body">
                        <img src="{{ asset('img/wp.png')  }}" class="img-responsive"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
