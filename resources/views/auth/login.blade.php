
<!doctype html>
<html  lang="ar"  dir="rtl" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="Cl6LLyq1MKxsNgEZHSkT99itwmbsicnByVfPzBpP">

    <title>Laravel</title>
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
   
       <!-- Styles -->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="http://localhost/tahaddy_dash_sidbar/public/css/app.css" rel="stylesheet">
   
 
    <!-- Scripts -->
      <script src="js/jquery-3.5.1.js"  ></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/jquery.dataTables.min.js" defer></script>
      <script src="js/dataTables.bootstrap5.min.js" defer></script>
      <script src="js/scripts.js"></script>
   <!--    <script src="js/app.js"></script> -->
     
      
      <script src="http://localhost/tahaddy_dash_sidbar/public/js/app.js"  ></script>
</head>
<body>

<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تسجيل الدخول</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('البريد الإلكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('تزكرني') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('دخول') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('نسيت كلمة المرور') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
                    </main>
                </div>
            </div>
        </div>
</div>
  </body>
</html>