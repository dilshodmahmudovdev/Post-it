<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>

<x-nav/>

<div class="dashboard">
    <div class="dashboard-container container">

        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-10 container-fluid">

                <div class="row">
                    <div class="col-xl-3 p-0">
                        <x-sidebar/>
                    </div>
                    <div class="col-xl-9 px-0">
                        <x-content>
                            @yield('content')
                        </x-content>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@yield('js')
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
