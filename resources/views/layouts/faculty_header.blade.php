<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Faculty ! Student’s Feedback Evaluation</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
     <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <script src="{{asset('admin/js/jquery-1.11.1.min.js')}}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('faculty_dash') }}">
                   Faculty ! Student’s Feedback Evaluation
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                           

                      
                          
                                <a class="nav-link" href="#" role="button">
                                    {{ $data->name }}
                                </a> 

                             

                               


                         <a class="nav-link" href="{{ route('faculty_profile') }}"></i> profile  </a> 

                                        


                         <a class="nav-link" role="button" href="{{ route('faculty_logout') }}"> <i class="fa fa-cog"></i> 
                                        {{ __('Logout') }}  </a>

                                 
                                </div>
                            
                       


                              
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
