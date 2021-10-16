<!doctype html>

<html lang="ja">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-language" content="ja">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')|admin</title>
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    @yield('css') 

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/admin/pages/style.css') }}" rel="stylesheet" type="text/css" />
</head>