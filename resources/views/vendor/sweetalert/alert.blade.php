@if (config('sweetalert.alwaysLoadJS') === true && config('sweetalert.neverLoadJS') === false )
    <script src="{{ $cdn ?? asset('vendors/sweetalert/sweetalert.all.js')  }}"></script>
@endif
{{-- {{dd(Session::get('alert'))}} --}}
@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif
    @if (config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false)
        <script src="{{ $cdn ?? asset('vendors/sweetalert/sweetalert.all.js')  }}"></script>
    @endif
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif
