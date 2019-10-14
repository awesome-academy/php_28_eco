<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="{{ asset('') }}">
        <title>Ngoc Long</title>
        <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="assets/admin/css/nunito.css" rel="stylesheet">
        <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/admin/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body id="page-top">
        <div id="wrapper">
            
            @include('admin.layouts.sidebar')

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                    @include('admin.layouts.header')

                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>

                @include('admin.layouts.footer')

            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
        <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="assets/admin/js/sb-admin-2.min.js"></script>
        <script src="assets/admin/js/my-script.js"></script>
    </body>
</html>
