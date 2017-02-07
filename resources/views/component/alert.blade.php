
@if(\Illuminate\Support\Facades\Session::has('success'))
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success Notification!</strong>
    <p>{{\Illuminate\Support\Facades\Session::get('success')}}</p>
</div>
@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Error Notification!</strong>
        <p>{{\Illuminate\Support\Facades\Session::get('error')}}</p>
    </div>
@endif