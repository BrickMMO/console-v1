<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BrickMMO Website Admin</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{url('app.css')}}">

        <script src="https://kit.fontawesome.com/57a8a8c892.js" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
        <script src="{{url('app.js')}}"></script>
        
    </head>
    <body class="w3-text-dark-grey">

        <header class="w3-padding-32 w3-center w3-border-bottom w3-margin-bottom">

            <h1 class="w3-text-red">BrickMMO Website Admin</h1>

            @if (Auth::check())
                <div class="w3-text-gray w3-small">
                    You are logged in as {{auth()->user()->first}} {{auth()->user()->last}}
                <div>
                <i class="fas fa-tachometer-alt"></i> <a href="/dashboard">Dashboard</a> | 
                <i class="fas fa-search"></i> <a href="https://brickmmo.com/">Website Home Page</a> | 
                <i class="fas fa-sign-out-alt"></i> <a href="/logout">Log Out</a> 
            @endif

        </header>

        @if (session()->has('message'))
            <div class="w3-padding w3-margin">
                <div class="w3-red w3-center w3-padding">{{session()->get('message')}}</div>
            </div>
        @endif
        
        <main class="w3-margin">

            @yield ('content')

        </main>

        <footer class="w3-padding-32 w3-container w3-center w3-border-top w3-margin-top">

            <a href="https://codeadam.ca/">
                <img src="https://codeadam.ca/images/code-block.png" width="75">
            </a>

        </footer>

    </body>
</html>