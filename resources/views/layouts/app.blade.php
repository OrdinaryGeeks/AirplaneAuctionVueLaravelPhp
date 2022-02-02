<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='/css/app.css'> {{-- <- bootstrap css --}}
    <link rel="stylesheet" href='/css/bootstrap.min.css'>   <title>@yield('title','Laravel 5.8 Basics')</title>
    <style>
.alert{
    z-index: 99;
    top: 60px;
    right:18px;
    min-width:30%;
    position: fixed;
    animation: slide 0.5s forwards;
}
@keyframes slide {
    100% { top: 30px; }
}
@media screen and (max-width: 668px) {
    .alert{ /* center the alert on small screens */
        left: 10px;
        right: 10px; 
    }
}
</style>
</head>
<body>
    {{-- That's how you write a comment in blade --}}
    
    @include('inc.navbar')
    
    <main class="container mt-4">
        @yield('content')
    </main>
   {{-- @include('inc.footer')--}}
   <script src='/js/jquery.min.js'></script>
   <script src='/js/app.js'></script> {{-- <- bootstrap and jquery --}}

    <script src='/js/bootstrap.min.js'></script>

    @if(session('status')) {{-- <- If session key exists --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('status')}} {{-- <- Display the session value --}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


</body>
</html>