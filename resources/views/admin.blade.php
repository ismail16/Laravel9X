<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://usebootstrap.com/preview-no-frame/adminlte-v3/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <!-- Scripts -->
    @routes
    @vite('resources/js/admin.js')
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

<!-- jQuery -->
<script src="https://usebootstrap.com/preview-no-frame/adminlte-v3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://usebootstrap.com/preview-no-frame/adminlte-v3/plugins/bootstrap/js/bootstrap.bundle.min.js">
</script>
<!-- AdminLTE App -->
<script src="https://usebootstrap.com/preview-no-frame/adminlte-v3/dist/js/adminlte.min.js"></script>




</html>
