<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @include('backend.includes.css')
    <style>
        #toast-container>.toast-error {
            background-color: #fa6533;
        }

        #toast-container>.toast-success {
            background-color: #06cf9c;
        }

    </style>
</head>

<body class="sb-nav-fixed">

    @include('backend.includes.header')


    <div id="layoutSidenav">
        @include('backend.includes.menu')
        <div id="layoutSidenav_content">
            @yield('body')
            @include('backend.includes.footer')
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    @include('backend.includes.js')
    <script src="https://cdn.tiny.cloud/1/hrershv3zlybc5gz12ssg9pr09yx93j5k0g4dnurgd5bijif/tinymce/6/tinymce.min.js">
    </script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });

    </script>
  <script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
    }
    toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif

    @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
    @endforeach
  </script>
    @stack('script')



</body>

</html>

