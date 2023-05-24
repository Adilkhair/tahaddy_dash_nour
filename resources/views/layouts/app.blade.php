<!doctype html>
<html  lang="ar"  dir="rtl" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
   
       <!-- Styles -->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
 
    <!-- Scripts -->
      <script src="js/jquery-3.5.1.js"  ></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/jquery.dataTables.min.js" defer></script>
      <script src="js/dataTables.bootstrap5.min.js" defer></script>
      <script src="js/scripts.js"></script>
   <!--    <script src="js/app.js"></script> -->
     
      
      <script src="{{ asset('js/app.js') }}"  ></script>
</head>
<body>
<div id="app">
       <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-start bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">  لوحة التحكم</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="show_topics">الأقٍسام</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="show_all_tests">الأسئلة</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="show_groups">المجموعات</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="excel_import_view">استيراد البيانات من ملف اكسل</a>
               
                  
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"><i class="bi-list"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <a class="navbar-brand" href="#"><i class="fa fa-rocket fa-4"></i> تطبيق تحدي</a>          
                        <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a  class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   مرحبا {{ Auth::user()->name }}
                                </a>
                            </li><li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('خروج') }}
                                    </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            
                        @endguest
                    </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                         
                   <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
</div>
  </body>
</html>
