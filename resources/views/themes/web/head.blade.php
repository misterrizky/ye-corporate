<head>
    <meta charset="UTF-8">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#5BC7DD">
    <meta name="msapplication-navbutton-color" content="#5BC7DD">
    <meta name="apple-mobile-web-app-status-bar-style" content="#5BC7DD">
    <!-- Favicon -->
    {{-- <link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png"> --}}
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/style.css')}}">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/responsive.css')}}">

    <!-- Fix Internet Explorer ______________________________________-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="vendor/html5shiv.js"></script>
        <script src="vendor/respond.js"></script>
    <![endif]-->	
</head>