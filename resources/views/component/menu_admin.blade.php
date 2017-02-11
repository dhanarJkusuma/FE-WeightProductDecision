

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="li-dashboard"><a href="{{ url('home') }}">Dashboard</a></li>
                <li id="li-cpenerima"><a href="{{ url('cpenerima')  }}">C. Penerima</a></li>
                <li id="li-kriteria"><a href="{{ url('kriteria')  }}">Kriteria</a></li>
                <li id="li-list"><a href="{{ url('home/list')  }}">Daftar Nilai</a></li>
                <li id="li-print"><a class="btn-print" href="#">Cetak Laporan</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


@push('javascript')
    <script>
        $(document).ready(function(){
            $('#li-{{ $menu  }}').addClass('active');
            //$(".btn-print").printPage();

            $(".btn-print").on('click', function(){

                var element = document.getElementById('frame');
                if(element==null){
                    var iframe = document.createElement("iframe");
                    iframe.setAttribute('name','frame');
                    iframe.setAttribute('id','frame');
                    iframe.setAttribute('src',"{{ url('print') }}");
                    iframe.setAttribute('style','display:none;');
                    document.body.appendChild(iframe);
                }else{
                    window.frames['frame'].focus();
                    window.frames['frame'].print();
                }

            });
        });
    </script>
@endpush