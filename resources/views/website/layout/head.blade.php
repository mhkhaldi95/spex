    <title>{{getSettingByKey($settings,'site_name')->value }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{getSettingByKey($settings,'site_icon')->value}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/slick.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/sal.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/vendor/base.css">
    <link rel="stylesheet" href="{{asset('')}}website/assets/css/style.min.css">

@yield('head')
